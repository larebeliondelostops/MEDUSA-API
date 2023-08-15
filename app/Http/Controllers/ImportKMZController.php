<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

/**
 * Controlador KMZ.
 *
 * Controlador que maneja la lógica para acceder a los puntos y lineas de los KMZ.
 *
 * @package    Controllers
 * @copyright  2023 Ignicion Games S.A.S.
 * @author     Johan Caicedo <jecg2509@gmail.com>
 * @version    v1.0.0
 */
class ImportKMZController extends Controller
{
    /**
     * Nombre del archivo .kml
     */
    private $kmlfilename;

    /**
     * Constructor de la clase.
     *
     * @access public
     */
    public function __construct()
    {
    }

    /**
     * Método para realizar la importación de archivos Excel los cuales contienen información acerca de hurtos
     *
     * @access public
     * @param Request $request
     */
    public function importLines(Request $request)
    {
        $uploadedFile = $request->file('kmz_file');

        $zip = new \ZipArchive();
        if ($zip->open($uploadedFile) === true) {
            // Resto del código de descompresión
            $extractPath = storage_path('app/public/kml_files/');
            $zip->extractTo($extractPath);
            $zip->close();
        } else {
            // Manejo de error si no se pudo abrir el archivo Zip
            dd('error');
        }

        $this->kmlfilename = Uuid::uuid4()->toString() . '.kml';
        rename($extractPath . 'doc.kml', $extractPath . $this->kmlfilename);

        $kmlFilePath = $extractPath . $this->kmlfilename;
        $kmlContents = file_get_contents($kmlFilePath);
        $kml = simplexml_load_string($kmlContents);

        $contador = 0;
        $geometry = [];

        foreach ($kml->Document->Folder->Placemark as $placemark) {

            $name = (string) $placemark->name[0];
            $coordinates = (string) $placemark->LineString->coordinates[0];

            $geometry[$contador] = [
                'name' => $name,
                'coordinates' => $coordinates
            ];

            $contador++;
        }

        return $geometry;
    }

    /**
     * Método para realizar la importación de archivos Excel los cuales contienen información acerca de hurtos
     *
     * @access public
     * @param Request $request
     */
    public function importPoints(Request $request)
    {
        $uploadedFile = $request->file('kmz_file');

        $zip = new \ZipArchive();
        if ($zip->open($uploadedFile) === true) {
            // Resto del código de descompresión
            $extractPath = storage_path('app/public/kml_files/');
            $zip->extractTo($extractPath);
            $zip->close();
        } else {
            // Manejo de error si no se pudo abrir el archivo Zip
            dd('error');
        }

        $this->kmlfilename = Uuid::uuid4()->toString() . '.kml';
        rename($extractPath . 'doc.kml', $extractPath . $this->kmlfilename);

        $kmlFilePath = $extractPath . $this->kmlfilename;
        $kmlContents = file_get_contents($kmlFilePath);
        $kml = simplexml_load_string($kmlContents);

        $contador = 0;
        $geometry = [];

        foreach ($kml->Document->Folder->Folder->Placemark as $placemark) {

            if(isset($placemark->Point))
            {
                $name = (string) $placemark->name[0];
                $coordinates = (string) $placemark->Point->coordinates[0];

                $geometry[$contador] = [
                    'name' => $name,
                    'coordinates' => $coordinates
                ];

                $contador++;
            }
        }

        return $geometry;
    }
}
