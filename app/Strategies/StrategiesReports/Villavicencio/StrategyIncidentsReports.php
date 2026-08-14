<?php

namespace App\Strategies\StrategiesReports\Villavicencio;

use App\Helpers\Helper;
use App\Interfaces\Reports\ReportActionsInterface;
use App\Models\Indicator;
use App\Models\Villavicencio\Incident;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class StrategyIncidentsReports implements ReportActionsInterface
{
    public const CACHE_KEY = 'villavicencio_incidents_reports_v4';

    private ?int $indicator = null;
    private Request $request;
    private Collection $incidents;
    private Collection $categories;
    private ?Indicator $subcategoryFilter = null;

    public function getCacheKeyReport(): string
    {
        // Versionar la llave evita servir por diez dias el reporte anterior al nuevo filtro.
        return self::CACHE_KEY;
    }

    public function getReportsData(Request $request): ?array
    {
        $this->request = $request;
        $this->subcategoryFilter = $this->resolveSubcategoryFilter($request);
        $this->categories = Indicator::query()
            ->whereNull('parent_indicator_id')
            ->with('children')
            ->orderBy('id')
            ->get();

        $query = $this->applySubcategoryFilter(Incident::query()->with('Indicator.parent'));
        if ($request->filled('start') && $request->filled('end')) {
            $query->whereBetween('created_at', [$request->start, $request->end]);
        }
        $this->incidents = $query->get();

        $general = [];
        if ($request->filled('start') && $request->filled('end')) {
            $general[] = $this->cardsIncidents();
        }
        $general[] = $this->incidensByMonth();
        $general[] = $this->incidentsByTypeLastTDays();
        $general[] = $this->incidentsByWeekDay();
        $general[] = $this->incidentsByHour();

        $reportsData = [$general];
        $tabs = $this->tabsIncidents();

        foreach ($this->categories as $category) {
            $this->indicator = $category->id;
            $reportsData[] = [
                $this->incidensByMonth(),
                $this->incidentsByWeekDay(),
                $this->incidentsByHour(),
                $this->incidentsByTypeHeatMap(),
                $this->points(),
            ];
        }

        $this->indicator = null;

        return ['tabs' => $tabs, 'reportsData' => $reportsData];
    }

    public function cardsIncidents(): array
    {
        $end = $this->request->filled('end') ? Carbon::parse($this->request->end) : Carbon::now();
        $start = $this->request->filled('start') ? Carbon::parse($this->request->start) : $end->copy()->subDays(30);
        $periodDays = max(1, $start->diffInDays($end));
        $previousStart = $start->copy()->subDays($periodDays);
        $previousEnd = $start->copy();

        $current = $this->categoryCounts($this->incidents)->sortDesc()->take(3);
        foreach ($this->categories as $category) {
            if ($current->count() >= 3) {
                break;
            }
            if (! $current->has($category->id)) {
                $current->put($category->id, 0);
            }
        }

        $previous = $this->categoryCounts($this->applySubcategoryFilter(
            Incident::query()->with('Indicator.parent')
        )->whereBetween('created_at', [$previousStart, $previousEnd])->get());

        $series = [];
        $labels = [];
        foreach ($current as $categoryId => $count) {
            $before = (int) $previous->get($categoryId, 0);
            $percent = $before === 0 ? ($count * 100) : (($count - $before) / $before) * 100;
            if ($count === 0 && $before > 0) {
                $percent = -100;
            }
            $series[] = ['data' => $count, 'percent' => round($percent, 2), 'type' => $percent > 0 ? 'red' : 'green'];
            $labels[] = optional($this->categories->firstWhere('id', (int) $categoryId))->name;
        }

        return [
            'title' => 'Cards de incidentes con sus respectivos porcentajes',
            'date' => $start->format('d/m/y') . ' - ' . $end->format('d/m/y'),
            'series' => $series,
            'labels' => $labels,
            'type' => 'cards',
        ];
    }

    public function tabsIncidents(): array
    {
        $counts = $this->categoryCounts($this->incidents);
        $series = [count($this->incidents)];
        $labels = ['General'];
        $keys = [0];

        foreach ($this->categories as $category) {
            $series[] = (int) $counts->get($category->id, 0);
            $labels[] = $category->name;
            $keys[] = $category->id;
        }

        return ['title' => 'Tabs', 'series' => $series, 'labels' => $labels, 'key' => $keys, 'type' => 'tabs'];
    }

    public function incidensByMonth(): array
    {
        $counts = $this->selectedIncidents()
            ->groupBy(fn (Incident $incident) => (int) ($incident->month ?: Carbon::parse($incident->created_at)->format('n')))
            ->map->count();
        $series = [];
        foreach (Helper::MONTH_NUMBER as $month) {
            $series[] = (int) $counts->get((int) $month, 0);
        }

        return [
            'title' => $this->indicator ? '# ' . $this->selectedCategoryName() . ' por mes' : '# Incidentes por mes',
            'date' => $this->dateLabel(),
            'series' => $series,
            'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            'type' => 'area',
        ];
    }

    public function incidentsByTypeLastTDays(): array
    {
        $counts = $this->categoryCounts($this->incidents);

        return [
            'title' => '# Incidentes por categoría',
            'date' => $this->dateLabel(),
            'series' => $this->categories->map(fn (Indicator $category) => (int) $counts->get($category->id, 0))->values(),
            'labels' => $this->categories->pluck('name')->values(),
            'type' => 'bar',
        ];
    }

    public function incidentsByWeekDay(): array
    {
        $series = $this->selectedIncidents()->groupBy(fn (Incident $incident) => $incident->indicator_id)
            ->map(function ($incidents) {
                $counts = $incidents->groupBy(fn (Incident $incident) => (int) ($incident->day ?: Carbon::parse($incident->created_at)->dayOfWeek))->map->count();
                $data = [];
                foreach (Helper::DAY_NUMBER as $day) {
                    $data[] = (int) $counts->get((int) $day, 0);
                }

                return ['name' => optional($incidents->first()->Indicator)->name ?? 'Sin indicador', 'data' => $data];
            })->values();

        return [
            'title' => $this->indicator ? '# ' . $this->selectedCategoryName() . ' por día de la semana' : '# Incidentes por día de la semana',
            'date' => $this->dateLabel(),
            'series' => $series,
            'labels' => Helper::DAY_NAME,
            'type' => 'column',
        ];
    }

    public function incidentsByHour(): array
    {
        $limits = [[0, 4], [4, 8], [8, 12], [12, 16], [16, 20], [20, 24]];
        $series = $this->selectedIncidents()->groupBy(fn (Incident $incident) => $incident->indicator_id)
            ->map(function ($incidents) use ($limits) {
                $data = array_fill(0, count($limits), 0);
                foreach ($incidents as $incident) {
                    $hour = Carbon::parse($incident->created_at)->hour;
                    foreach ($limits as $index => [$start, $end]) {
                        if ($hour >= $start && $hour < $end) {
                            $data[$index]++;
                            break;
                        }
                    }
                }

                return ['name' => optional($incidents->first()->Indicator)->name ?? 'Sin indicador', 'data' => $data];
            })->values();

        return [
            'title' => $this->indicator ? '# ' . $this->selectedCategoryName() . ' por intervalos de horas' : '# Incidentes por intervalos de horas',
            'date' => $this->dateLabel(),
            'series' => $series,
            'labels' => ['(00:00-04:00)', '(04:00-08:00)', '(08:00-12:00)', '(12:00-16:00)', '(16:00-20:00)', '(20:00-24:00)'],
            'type' => 'column',
        ];
    }

    public function incidentsHeatMap(): array
    {
        $series = [];
        foreach (Helper::MONTH_NUMBER_DB as $month) {
            $monthData = ['name' => Helper::mesNombre($month), 'data' => []];
            foreach (range(1, 31) as $day) {
                $count = $this->incidents->filter(function (Incident $incident) use ($month, $day) {
                    $date = Carbon::parse($incident->created_at);
                    return $date->month === (int) $month && $date->day === $day;
                })->count();
                $monthData['data'][] = ['x' => str_pad((string) $day, 2, '0', STR_PAD_LEFT), 'y' => $count];
            }
            $series[] = $monthData;
        }

        return ['title' => 'Incidentes mediante mapa de calor', 'date' => $this->dateLabel(), 'series' => $series, 'type' => 'matrix'];
    }

    public function incidentsByTypeHeatMap(): array
    {
        $limits = [[0, 4], [4, 8], [8, 12], [12, 16], [16, 20], [20, 24]];
        $incidents = $this->selectedIncidents();
        $series = [];

        foreach (Helper::DAY_NUMBER as $day) {
            $dayData = ['name' => Helper::diaNombre($day), 'data' => []];
            foreach ($limits as [$start, $end]) {
                $count = $incidents->filter(function (Incident $incident) use ($day, $start, $end) {
                    $date = Carbon::parse($incident->created_at);
                    $incidentDay = (int) ($incident->day ?: $date->dayOfWeek);
                    return $incidentDay === (int) $day && $date->hour >= $start && $date->hour < $end;
                })->count();
                $dayData['data'][] = ['x' => "$start-$end", 'y' => $count];
            }
            $series[] = $dayData;
        }

        return [
            'title' => $this->selectedCategoryName() . ' por día de la semana y rango de horas',
            'date' => $this->dateLabel(),
            'series' => $series,
            'type' => 'matrix',
        ];
    }

    public function points(): array
    {
        return [
            'type' => 'heatmap',
            'points' => $this->selectedIncidents()
                ->filter(fn (Incident $incident) => $incident->latitude !== null && $incident->longitude !== null)
                ->map(fn (Incident $incident) => [(float) $incident->latitude, (float) $incident->longitude])
                ->values(),
        ];
    }

    private function selectedIncidents(): Collection
    {
        if ($this->indicator === null) {
            return $this->incidents;
        }

        return $this->incidents->filter(fn (Incident $incident) => $this->categoryIdFor($incident) === $this->indicator)->values();
    }

    private function categoryCounts(Collection $incidents)
    {
        return $incidents->map(fn (Incident $incident) => $this->categoryIdFor($incident))->filter()->countBy();
    }

    private function categoryIdFor(Incident $incident): ?int
    {
        $indicator = $incident->Indicator;
        return $indicator ? (int) ($indicator->parent_indicator_id ?: $indicator->id) : null;
    }

    private function resolveSubcategoryFilter(Request $request): ?Indicator
    {
        if (! $request->filled('IndicatorId')) {
            return null;
        }

        $indicatorId = (string) $request->input('IndicatorId');
        if (! ctype_digit($indicatorId) || (int) $indicatorId < 1) {
            throw (new ModelNotFoundException())->setModel(Indicator::class, [$indicatorId]);
        }

        $subcategory = Indicator::query()
            ->whereNotNull('parent_indicator_id')
            ->find((int) $indicatorId);

        if (! $subcategory) {
            throw (new ModelNotFoundException())->setModel(Indicator::class, [(int) $indicatorId]);
        }

        return $subcategory;
    }

    private function applySubcategoryFilter(Builder $query): Builder
    {
        if (! $this->subcategoryFilter) {
            return $query;
        }

        return $query->where(
            (new Incident())->getIndicatorColumn(),
            $this->subcategoryFilter->id
        );
    }

    private function selectedCategoryName(): string
    {
        return optional($this->categories->firstWhere('id', $this->indicator))->name ?? 'Categoría';
    }

    private function dateLabel(): string
    {
        if ($this->request->filled('start') && $this->request->filled('end')) {
            return Carbon::parse($this->request->start)->format('d/m/y') . ' - ' . Carbon::parse($this->request->end)->format('d/m/y');
        }

        return 'Histórico';
    }
}
