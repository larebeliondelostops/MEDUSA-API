<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Marker;
use App\Contexts\AllDataContext;
use App\Models\Slug;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CRUDController extends Controller
{
    /**
     * Variable para almacenar el contexto de la data
     */
    private $value;
    private $all_data;
    private $slugs;

    /**
     * AllDataController constructor.
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all($slug)
    {
        try {
            $this->getSubDomain();

            $this->slugs = Slug::where('name', $slug)->first();

            $all_data = $this->value::STRATEGY[$this->slugs->id]::all();

            return Response::json($all_data, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allTable(Request $request, $slug)
    {
        try {

            $this->getSubDomain();

            $this->slugs = Slug::where('name', $slug)->first();

            $strategy = $this->value::STRATEGY[$this->slugs->id];
            $strategy = new $strategy();
            $data = $strategy->allTable($request);

            return $data;
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function get($slug, $id)
    {
        try {

            $this->getSubDomain();

            $this->slugs = Slug::where('name', $slug)->first();

            $strategy = $this->value::STRATEGY[$this->slugs->id];
            $strategy = new $strategy();
            $data = $strategy->getOne($id);

            return $data;
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function store(Request $request, $slug)
    {
        try {

            $this->getSubDomain();

            $this->slugs = Slug::where('name', $slug)->first();

            $strategy = $this->value::STRATEGY[$this->slugs->id];
            $strategy = new $strategy();
            $data = $strategy->store($request);

            return $data;
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function update(Request $request, $slug, $id)
    {
        try {

            $this->getSubDomain();

            $this->slugs = Slug::where('name', $slug)->first();

            $strategy = $this->value::STRATEGY[$this->slugs->id];
            $strategy = new $strategy();
            $data = $strategy->update($request, $id);

            return $data;
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function destroy($slug, $id)
    {
        try {

            $this->getSubDomain();

            $this->slugs = Slug::where('name', $slug)->first();

            $strategy = $this->value::STRATEGY[$this->slugs->id];
            $strategy = new $strategy();
            $data = $strategy->destroy($id);

            return $data;
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function getSubDomain()
    {
        $this->value = AllDataContext::VALUE[tenant('id')];
    }
}
