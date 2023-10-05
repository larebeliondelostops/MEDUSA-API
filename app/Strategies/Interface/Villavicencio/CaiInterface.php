<?php

namespace App\Strategies\Interface\Villavicencio;

use App\Http\Request\Cai\CaiRequest;
use App\Models\Alarms;
use \Illuminate\Http\Request;

interface CaiInterface
{
    public static function all();
    public function allTable(Request $request);
    public function getOne($id);
    public function store(CaiRequest $request);
    public function update(Request $request, $id);
    public function destroy($id);
    public function storeMax(Request $request);
}