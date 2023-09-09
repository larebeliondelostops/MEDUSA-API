<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shapefile\ShapefileReader;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<< HEAD
=======
        $shapefile = new ShapefileReader(storage_path() . '/app/public/shp/MGN_ANM_DPTOS.shp');
        $Geometry = $shapefile->fetchRecord();
        $geoJsonGeometry = $Geometry->getGeoJSON();
>>>>>>> 3946c89e0031a16df7d760146cf8dc5dec81f757

        return view('home', ['geoJsonGeometry' => $geoJsonGeometry]);
    }
}
