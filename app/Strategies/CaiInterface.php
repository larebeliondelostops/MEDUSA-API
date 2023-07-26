<?php

namespace App\Strategies;

use App\Http\Request\Cai\CaiRequest;
use App\Models\Alarms;
use \Illuminate\Http\Request;

interface CaiInterface
{
    public function all();
    public function store(CaiRequest $request);
    public function update(Request $request, $id);
    public function destroy($id);
    public function storeMax(Request $request);
}