<?php

namespace App\Interfaces\Cruds;

use App\Interfaces\StrategyInterface;

interface CrudActionsInterface extends StrategyInterface
{
    public function index(array $request);

    public function store(array $request);

    public function show($id);

    public function update(array $request, $id);

    public function destroy($id);
}