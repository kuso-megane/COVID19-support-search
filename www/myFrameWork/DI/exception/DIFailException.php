<?php

namespace myapp\myFrameWork\DI\exception;

use Exception;

class DIFailException extends Exception
{
    public function __construct()
    {
        $this->message = 'cannot create an instance of unknown class';
    }
}
