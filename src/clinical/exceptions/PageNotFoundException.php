<?php

namespace src\clinical\exceptions;

use Exception;
use Throwable;

class PageNotFoundException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}