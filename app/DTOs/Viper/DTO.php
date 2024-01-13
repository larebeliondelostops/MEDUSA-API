<?php

namespace App\DTOs\Viper;

use \ReflectionClass;

/**
 * Clase base DTO (Data Transfer Object).
 *
 * Esta clase proporciona funcionalidades básicas para los objetos de transferencia de datos en la aplicación.
 * Facilita la inicialización de propiedades a partir de un array y la conversión de objetos a un array.
 * @package    App\Service\Viper
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */

class DTO
{

    /**
     * Constructor de la clase DTO.
     *
     * Inicializa el objeto DTO con los valores proporcionados en un array.
     * Las claves del array deben coincidir con los nombres de las propiedades del objeto DTO.
     *
     * @param array $data Datos para inicializar el objeto DTO.
     */
    public function __construct(array $data) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * Convierte el objeto DTO a un array.
     *
     * Usa la reflexión para acceder a todas las propiedades del objeto y las convierte en un array asociativo.
     *
     * @return array Array asociativo que representa el objeto DTO.
     */
    public function toArray(array $except=[])
    {
        $array = [];
        $reflectionClass = new ReflectionClass($this);
        foreach ($reflectionClass->getProperties() as $property) {
            if(in_array($property->getName(), $except)) continue;
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($this);
        }
        return $array;
    }
}
