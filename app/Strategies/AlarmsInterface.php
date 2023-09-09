<?php

namespace App\Strategies;

use App\Http\Request\Alarms\AlarmsRequest;
use App\Models\Alarms;
use \Illuminate\Http\Request;

interface AlarmsInterface
{
    public function all();
    public function allTable(Request $request);
    public function getOne($id);
    public function store(AlarmsRequest $request);
    public function update(Request $request, $id);
    public function destroy($id);
    public function storeMax(Request $request);

}