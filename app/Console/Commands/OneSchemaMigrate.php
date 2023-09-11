<?php

namespace App\Console\Commands;


use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Migrations\Migrator;
use Symfony\Component\Console\Input\InputOption;
use Spatie\Multitenancy\TenantFinder\TenantFinder;
use Illuminate\Database\Console\Migrations\MigrateCommand;

class OneSchemaMigrate extends MigrateCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'one:schema:migrate {--data : Run seeders after migrations}
                {--tenant= : The tenant name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * The name of schema
     */
    protected $schema;

    /**
     * Variable global para manejar el error
     */
    protected $error = false;

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
        $this->info('Iniciando migraciones.');

        // Obtén la lista de esquemas según las carpetas de migración
        $this->schema = $this->option('tenant') ?: $this->ask('¿Cuál es el nombre del esquema?');

        // Validar la existencia del schema
        $this->validateSchema();

        if ($this->error) {
            $this->output->write("\n\t<error>ERROR</error> No existe el schema " . $this->schema . "\n\n");
            return;
        }

        // Cambia a la conexión del esquema actual
        config(['database.connections.pgsql.schema' => $this->schema]);

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
                '--class' => $this->option('seeder') ?: 'Database\\Seeders\\' . $this->schema . '_seeders' . '\\DatabaseSeeder',
                '--force' => true,
            ]);
        }

        $this->info('Migraciones completadas para el esquema ' . $this->schema);
    }

    public function validateSchema()
    {
        $tenantFinder = app(TenantFinder::class);

        $tenant = $tenantFinder->getTenantModel()::where('schema', $this->schema)->first();

        if ($tenant) {
            return $tenant->schema; // Devuelve el esquema del inquilino si existe
        } else {

            $this->error = true;

        }
    }

    /**
     * Overwrite de la clase principal para obtener la ruta de las migraciones
     */
    protected function getMigrationPaths()
    {
        $paths = [];

        return $paths[] = database_path('migrations/' . $this->schema);;
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
            ['tenant', 'public', InputOption::VALUE_NONE, 'Indicates if the seed task should be re-run'],
        ];
    }
}
