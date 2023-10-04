<?php

namespace App\Strategies;

use App\Http\Request\Entities\EntitiesRequest;
use App\Models\Entities;
use \Illuminate\Http\Request;

interface EntitiesInterface
{
    public static function all();
    public function allTable(Request $request);
    public function getOne($id);
    public function store(EntitiesRequest $request);
    public function update(Request $request, $id);
    public function destroy($id);
    public function storeMax(Request $request);

}