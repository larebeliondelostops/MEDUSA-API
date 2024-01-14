<?php

namespace App\Http\Controllers\Viper;
use App\Interfaces\Viper\MunicipalityInterface;

class MunicipalityController extends BaseController
{
    private MunicipalityInterface $municipalityInterface;

    public function __construct(MunicipalityInterface $municipalityInterface)
    {
        parent::__construct();
        $this->municipalityInterface = $municipalityInterface;
    }

    public function store()
    {

    }

    public function index()
    {

    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
