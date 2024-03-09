<?php

namespace App\Interfaces\Cruds;

interface CrudInterface
{
    public function index($request, $slug);

    public function store($request, $slug);

    public function show($slug, $id);

    public function update($request, $slug, $id);

    public function destroy($slug, $id);
}