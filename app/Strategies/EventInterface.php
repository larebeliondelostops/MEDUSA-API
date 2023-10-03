<?php

namespace App\Strategies;

use App\Http\Request\Events\EventsRequest;
use \Illuminate\Http\Request;

interface EventInterface
{
    public function all();
    public function allTable(Request $request);
    public function get($id);
    public function store(EventsRequest $request);
    public function update(Request $request, $id);
    public function destroy($id);
}