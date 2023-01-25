<?php

namespace App\Common\Exceptions;

use Exception;

abstract class CustomValidationWithFieldException extends Exception
{
    public function getError(): array
    {
        return [$this->getField() => [$this->getMessage()]];
    }

    abstract protected function getField(): string;
}
