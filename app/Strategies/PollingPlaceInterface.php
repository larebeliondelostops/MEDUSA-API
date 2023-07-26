<?php

namespace App\Strategies;

use App\Http\Request\PollingPlace\PollingPlaceRequest;
use App\Models\PollingPlace;
use \Illuminate\Http\Request;

interface PollingPlaceInterface
{
    public function all();
    public function store(PollingPlaceRequest $request);
    public function update(Request $request, $id);
    public function destroy($id);
    public function storeMax(Request $request);

}