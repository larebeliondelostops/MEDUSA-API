<?php

namespace App\Strategies;

use App\Http\Request\Health\HealthRequest;
use \Illuminate\Http\Request;

interface HealthInterface
{
    public function all();
    public function store(HealthRequest $request);
    public function update(Request $request, $id);
    public function destroy($id);

}