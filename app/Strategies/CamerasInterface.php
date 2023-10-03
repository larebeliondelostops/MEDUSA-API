<?php

namespace App\Strategies;

use App\Http\Request\Cameras\CamerasRequest;
use App\Models\Alarms;
use \Illuminate\Http\Request;

interface CamerasInterface
{
    public static function all();
    public function allTable(Request $request);
    public function getOne($id);
    public function store(CamerasRequest $request);
    public function update(Request $request, $id);
    public function destroy($id);
    public function storeMax(Request $request);
}