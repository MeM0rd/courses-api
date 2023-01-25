<?php

namespace App\Auth\Exceptions;

use App\Common\Exceptions\CustomValidationWithFieldException;

class EmailValidationException extends CustomValidationWithFieldException
{
    protected function getField(): string
    {
        return 'email';
    }
}
