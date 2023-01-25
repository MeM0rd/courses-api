<?php

namespace App\Common\Exceptions;

use Exception;
use Throwable;

class ValidationWithMessageException extends Exception
{
    private mixed $data;

    public function __construct(string $message = '', $data = [], int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->data = $data;
    }

    public function getData(): mixed
    {
        return $this->data;
    }
}
