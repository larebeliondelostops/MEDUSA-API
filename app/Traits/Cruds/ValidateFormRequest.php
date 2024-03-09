<?php

namespace App\Traits\Cruds;

trait ValidateFormRequest
{
    public function validateRequest(string $path, $request): void
    {
        $formRequest = $path::createFromBase($request);

        $formRequest->setContainer(app())->validateResolved();
    }
}