<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Database\Seeders\CologneSeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use RuntimeException;
use Throwable;

class SyncCologneTenant extends Command
{
    protected $signature = 'tenant:sync-cologne
        {--tenant=cologne : Identificador del tenant de destino}
        {--domain= : Dominio opcional que se asociara al tenant}';

    protected $description = 'Migra y sincroniza de forma idempotente el tenant de Colonia';

    public function handle(): int
    {
        $tenantId = trim((string) $this->option('tenant'));
        $domain = trim((string) $this->option('domain'));

        if (! preg_match('/^[a-z0-9][a-z0-9_-]{1,62}$/', $tenantId)) {
            $this->error('El identificador del tenant solo puede contener minusculas, numeros, guion y guion bajo.');

            return self::INVALID;
        }

        try {
            $this->migrateCentralDatabase();

            $tenant = Tenant::find($tenantId);
            if ($tenant === null) {
                $this->info("Creando tenant {$tenantId} y su base de datos...");
                $tenant = Tenant::create(['id' => $tenantId]);
            }

            if ($domain !== '' && ! $tenant->domains()->where('domain', $domain)->exists()) {
                $tenant->domains()->create(['domain' => $domain]);
            }

            tenancy()->initialize($tenant);

            $this->runMigrationPath(database_path('migrations/tenant'));
            $this->runMigrationPath(database_path('migrations/cologne'));

            $exitCode = Artisan::call('db:seed', [
                '--class' => CologneSeeder::class,
                '--force' => true,
            ], $this->output);

            if ($exitCode !== self::SUCCESS) {
                throw new RuntimeException('La sincronizacion de datos termino con un codigo distinto de cero.');
            }

            $this->newLine();
            $this->info("Tenant {$tenantId} sincronizado correctamente.");

            return self::SUCCESS;
        } catch (Throwable $exception) {
            report($exception);
            $this->error($exception->getMessage());

            return self::FAILURE;
        } finally {
            if (tenancy()->initialized) {
                tenancy()->end();
            }
        }
    }

    private function migrateCentralDatabase(): void
    {
        $this->info('Verificando migraciones de la base central...');
        $exitCode = Artisan::call('migrate', [
            '--database' => config('database.default'),
            '--path' => database_path('migrations'),
            '--realpath' => true,
            '--force' => true,
        ], $this->output);

        if ($exitCode !== self::SUCCESS) {
            throw new RuntimeException('No fue posible completar las migraciones centrales.');
        }
    }

    private function runMigrationPath(string $path): void
    {
        $this->info("Verificando {$path}...");
        $exitCode = Artisan::call('migrate', [
            '--database' => 'tenant',
            '--path' => $path,
            '--realpath' => true,
            '--force' => true,
        ], $this->output);

        if ($exitCode !== self::SUCCESS) {
            throw new RuntimeException("No fue posible completar las migraciones de {$path}.");
        }
    }
}
