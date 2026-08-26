<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Services\Cruds\CrudService;
use Illuminate\Support\Facades\Log;
use App\Interfaces\Cruds\CrudInterface;
use Illuminate\Support\Facades\Response;
use App\Support\TenantLanguage;

class CrudController extends Controller
{
    /**
     * CrudController constructor.
     *
     * @param CrudService $service
     */
    public function __construct(
        private CrudInterface $service
    )
    {}

    /**
     * Método para traer toda la data de las tablas.
     *
     * @param Request $request
     * @param String $slug
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, string $slug)
    {
        try {

            return $this->service->index($request, $slug);

        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json(['message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request')], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Método para persistir un objeto.
     *
     * @param Request $request
     * @param String $slug
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, string $slug)
    {
        try {

            return $this->service->store($request, $slug);

        } catch (ValidationException $exception) {
            return Response::json([
                'status' => 'error',
                'message' => TenantLanguage::text('Datos Recibidos Incorrectos', 'Invalid data received'),
                'errors' => $exception->errors(),
            ], 422, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json(['message' => $exception->getMessage()], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Método para traer los atributos de un modelo.
     *
     * @param String $slug
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug, $id)
    {
        try {

            $data = $this->service->show($slug, $id);

            return Response::json(['status' => 'succes', 'data' => $data], 200, [], JSON_PRETTY_PRINT);

        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json(['message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request')], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Método para actualizar los atributos de un modelo.
     *
     * @param Request $request
     * @param String $slug
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug, $id)
    {
        try {

            return $this->service->update($request, $slug, $id);

        } catch (ValidationException $exception) {
            return Response::json([
                'status' => 'error',
                'message' => TenantLanguage::text('Datos Recibidos Incorrectos', 'Invalid data received'),
                'errors' => $exception->errors(),
            ], 422, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json(['message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request')], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Método para eliminar un modelo.
     *
     * @param String $slug
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $slug, $id)
    {
        try {

            return $this->service->destroy($slug, $id);

        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json(['message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request')], 500, [], JSON_PRETTY_PRINT);
        }
    }
}
