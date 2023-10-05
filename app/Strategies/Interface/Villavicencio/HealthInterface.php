<?php

namespace App\Strategies\Interface\Villavicencio;

use App\Http\Request\Health\HealthRequest;
use \Illuminate\Http\Request;

interface HealthInterface
{
    public function all();
    public function store(HealthRequest $request);
    public function update(Request $request, $id);
    public function destroy($id);
    public function storeMax(Request $request);

}