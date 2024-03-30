<?php

namespace App\Exceptions\Modules\Viper;

use App\Exceptions\CustomException;

class UndefinedProjectScopeException extends CustomException
{
    public function __construct(string $customMessage = 'The project scope is undefined.')
    {
        parent::__construct(message: $customMessage, code: 404);
    }
}
