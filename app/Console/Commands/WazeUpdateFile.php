<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class WazeUpdateFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'waze:units:file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
    {
        $peticion = new \GuzzleHttp\Client();

        $headers = [
            'Content-Encoding' => 'UTF-8',
            'Accept-Encoding' => 'gzip, deflate',
            'Content-Type' => 'application/json',
        ];

        $response = $peticion->get('https://www.waze.com/row-partnerhub-api/partners/11760827944/waze-feeds/85aedc64-4772-4f4c-ad4e-3a9461ee9c15?format=1', [
                'headers' => $headers,
                'decode_content' => false,
        ]);

        // Para acceder al cuerpo de la respuesta
        $body = $response->getBody();

        // Si decidiste no decodificar automáticamente, pero el contenido no está realmente comprimido, simplemente convierte el cuerpo a cadena
        $contenido = $body->getContents();

        file_put_contents('waze.json', $contenido);
    }
}