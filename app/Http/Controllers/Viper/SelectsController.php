<?php

namespace App\Http\Controllers\Viper;

use App\Interfaces\Viper\SelectsInterface;

/**
 * Controlador que maneja todo lo que tiene que ver con los selects para la creación de un proyecto
 *
 * @package    App\Http\Controllers\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Daniel Alferez <dan.alferez1@gmail.com>
 * @version    v1.0.0
 */

class SelectsController extends BaseController
{
    private SelectsInterface $selectsInterface;

    public function __construct(SelectsInterface $selectsInterface)
    {
        parent::__construct(); // Se tiene que llamar al contructor padre para que se configure correctamente el BaseController
        $this->selectsInterface = $selectsInterface;
    }

     /**
     * Mostrar los datos disponibles en los diferentes selects para la creación de un proyecto.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $selectss = $this->selectsInterface->getAllSelects();

            return response()->json([
                'data' => $selectss,
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

}
