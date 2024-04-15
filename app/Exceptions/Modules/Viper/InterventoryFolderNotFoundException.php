<?php

namespace App\Exceptions\Modules\Viper;

use App\Exceptions\CustomException;

class InterventoryFolderNotFoundException extends CustomException
{
    public function __construct(string $customMessage = 'The interventory folder could not be found.')
    {
        parent::__construct(message: $customMessage, code: 404);
    }
}
