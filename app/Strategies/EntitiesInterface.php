<?php

namespace App\Strategies;

use App\Http\Request\Entities\EntitiesRequest;
use App\Models\Entities;
use \Illuminate\Http\Request;

interface EntitiesInterface
{
    public function all();
    public function store(EntitiesRequest $request);
    public function update(Request $request, $id);
    public function destroy($id);

}