<?php

namespace App\Exceptions;

use Exception;

class ForbiddenException extends Exception
{
    /**
     * ForbiddenException constructor.
     * @param string $message
     * @param int $code
     */
    public function __construct($message = '', $code = 0)
    {
        parent::__construct($message, $code);
    }
}