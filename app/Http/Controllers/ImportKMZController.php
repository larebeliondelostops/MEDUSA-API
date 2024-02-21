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
            // Rest of the decompression code
            $extractPath = storage_path('app/public/kml_files/');
            $zip->extractTo($extractPath);
            $zip->close();
        } else {
            // Handle error if Zip file couldn't be opened
            dd('error');
        }

        $this->kmlfilename = Uuid::uuid4()->toString() . '.kml';
        rename($extractPath . 'doc.kml', $extractPath . $this->kmlfilename);

        $kmlFilePath = $extractPath . $this->kmlfilename;
        $kmlContents = file_get_contents($kmlFilePath);
        $kml = simplexml_load_string($kmlContents);

        $geometry = [];

        foreach ($kml->Document->Folder->Placemark as $placemark) {
            $name = (string) $placemark->name[0];
            $coordinates = (string) $placemark->LineString->coordinates[0];

            // Process coordinates to create LineString coordinates array
            $coordinatesArray = [];
            $coordinatesList = explode(' ', trim($coordinates));
            foreach ($coordinatesList as $coord) {
                list($longitude, $latitude, $altitude) = explode(',', $coord);
                $coordinatesArray[] = [(float) $longitude, (float) $latitude, (float) $altitude];
            }

            $geometry[] = [
                'name' => $name,
                'lineCoordinates' => [
                    'type' => 'Feature',
                    'geometry' => [
                        'type' => 'LineString',
                        'coordinates' => $coordinatesArray,
                    ],
                ],
            ];
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
        //dd($uploadedFile);
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
            if (isset($placemark->Point)) {
                $name = (string) $placemark->name[0];
                $coordinates = (string) $placemark->Point->coordinates[0];

                list($longitude, $latitude) = explode(',', $coordinates);
                $coordinates = "$latitude, $longitude";
                
                $feature = [
                    "type" => "Feature",
                    "geometry" => [
                        "type" => "Point",
                        "coordinates" => [
                            (float) $longitude,
                            (float) $latitude,
                        ],
                    ],
                ];

                $pointCoordinates = [
                    "features" => [$feature],
                ];

                $entry = [
                    "name" => $name,
                    "coordinates" => $coordinates,
                ];

                $features[] = $entry;
            }
        }

        return $features;
    }

    /**
     * Método para realizar la importación de archivos Excel los cuales contienen información y su lectura dinamica
     *
     * @access public
     * @param Request $request
     */
    public function importDinamic(Request $request)
    {
        ini_set('memory_limit', '12G');
        ini_set('max_execution_time', 20000);

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
        $features = [];
        $geometry = [];
        //dd($kml->Document->Folder->Folder[9]->Folder[1]);
        foreach ($kml->Document->Folder->Folder[9]->Folder[1]->Placemark as $placemark) {
            $entry = [
                'type' => 'Feature',
                'markerType' => 30,
                'tittle' => (string) $placemark->name[0],
                'properties' => [
                    'Tipo' => 'Puntos Vive Digital y Acceso Comunitario'
                ]
            ];
    
            if (isset($placemark->Point)) {
                $coordinates = (string) $placemark->Point->coordinates[0];
                list($longitude, $latitude) = explode(',', $coordinates);

                $entry['geometry'] = [
                    "type" => "Point",
                    "coordinates" => [
                        (float) $longitude,
                        (float) $latitude,
                    ],
                ];
            } elseif (isset($placemark->LineString)) {
                $name = (string) $placemark->name[0];
                $coordinates = (string) $placemark->LineString->coordinates[0];
    
                // Process coordinates to create LineString coordinates array
                $coordinatesArray = [];
                $coordinatesList = explode(' ', trim($coordinates));
                foreach ($coordinatesList as $coord) {
                    list($longitude, $latitude, $altitude) = explode(',', $coord);
                    $coordinatesArray[] = [(float) $longitude, (float) $latitude, (float) $altitude];
                }
    
                $entry['geometry'] = [
                    'type' => 'LineString',
                    'coordinates' => $coordinatesArray,
                ];
            }
    
            if (isset($placemark->ExtendedData)) {
                $properties = [];
                foreach ($placemark->ExtendedData->SchemaData->SimpleData as $simpleData) {
                    $propertyName = (string) $simpleData->attributes()->name;
                    $propertyValue = (string) $simpleData;
                    $properties[$propertyName] = $propertyValue;
                }
    
                $entry['properties'] = $properties;
            }
    
            $features[] = $entry;
            $contador++;
        }
        //dd($contador);
        return $features;
    }
}
