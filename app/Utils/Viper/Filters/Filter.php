<?php

namespace App\Utils\Viper\Filters;

class Filter
{
    protected $safeParam = [];
    protected $columnMap = [];
    protected $operatorMap = [];

    public function transform(array $queryParams)
    {
        $eloQuery = [];
        foreach ($this->safeParam as $param => $operators)
        {
            // Usa directamente el array asociativo en lugar del Request
            if (!isset($queryParams[$param]))
                continue;

            $queryValue = $queryParams[$param];
            $column = $this->columnMap[$param] ?? $param;

            foreach ($operators as $operator)
                if (isset($queryValue[$operator]))
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $queryValue[$operator]];
        }

        return $eloQuery;
    }
}
