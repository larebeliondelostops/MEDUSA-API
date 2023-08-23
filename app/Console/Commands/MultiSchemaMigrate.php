<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Database\Console\Migrations\MigrateCommand;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\ArgvInput;
use Illuminate\Support\Facades\Artisan;

class MultiSchemaMigrate extends MigrateCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'multi:schema:migrate {--data : Run seeders after migrations}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(app(Migrator::class), app(Dispatcher::class));
    }

    protected function configure()
    {
        $this->addOption('database', null, InputOption::VALUE_OPTIONAL, 'The database connection to use');
        $this->addOption('pretend', false, InputOption::VALUE_OPTIONAL, 'Necesario para funcionar');
        $this->addOption('step', false, InputOption::VALUE_OPTIONAL, 'Necesario para funcionar');
        $this->addOption('schema-path', null, InputOption::VALUE_OPTIONAL, 'The database connection to use');
        $this->addOption('seeder', true, InputOption::VALUE_OPTIONAL, 'Necesario para funcionar');
        $this->addOption('seed', false, InputOption::VALUE_OPTIONAL, 'Necesario para funcionar');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Iniciando migraciones en múltiples esquemas.');

        // Obtén la lista de esquemas según las carpetas de migración
        $schemas = $this->getSchemas();

        foreach ($schemas as $schema) {

            // Cambia a la conexión del esquema actual
            config(['database.connections.pgsql.schema' => $schema]);

            $this->newLine();

            $this->components->task('Dropping all tables', fn () => $this->callSilent('db:wipe', array_filter([
                '--force' => true,
            ])) == 0);

            $this->newLine();

            // Ejecuta las migraciones en el esquema actual
            parent::handle();

            $this->newLine();

            // Si se desea ejecutar seeders, llámalo aquí
            if ($this->option('data')) {
                $this->call('db:seed', [
                    '--class' => $this->option('seeder') ?: 'Database\\Seeders\\' . $schema . '_seeders' . '\\DatabaseSeeder',
                    '--force' => true,
                ]);
            }
        }

        $this->info('Migraciones completadas en todos los esquemas.');
    }

    /**
     * Obtiene la lista de esquemas según las carpetas de migración
     *
     * @return array
     */
    protected function getSchemas()
    {
        // Obtén la lista de carpetas de migración en 'database/migrations'
        $migrationFolders = array_diff(scandir(database_path('migrations')), ['.', '..']);

        // Filtra las carpetas válidas (excluye archivos, solo toma directorios)
        $validFolders = array_filter($migrationFolders, function ($folder) {
            return is_dir(database_path('migrations/' . $folder));
        });

        return $validFolders;
    }

    /**
     * Overwrite de la clase principal para obtener las rutas de migración de cada esquema
     */
    protected function getMigrationPaths()
    {
        $schemas = $this->getSchemas();

        $paths = [];

        foreach ($schemas as $schema) {
            $paths[] = database_path('migrations/' . $schema);
        }

        return $paths;
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['database', null, InputOption::VALUE_OPTIONAL, 'The database connection to use'],
            ['data', null, InputOption::VALUE_NONE, 'Indicates if the seed task should be re-run'],
        ];
    }
}
