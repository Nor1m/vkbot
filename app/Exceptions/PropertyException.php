<?php

namespace App\Exceptions;

use Throwable;

abstract class PropertyException extends \Exception
{
    public function __construct(string $message = "", int $code = 7207, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}