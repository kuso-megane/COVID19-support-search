<?php

namespace myapp\myFrameWork\Exception;

use Exception;
use Throwable;


/**
 * thrown when not TypeError but unexpeted.
 * (e.g.) function hoge (int $num)
 * $num is expected 1 or 2 but when 3 given, throw this exception.
 */
class UnexpectedParamException extends Exception
{
    private $given;

    public function __construct($given, int $code = 0 , Throwable $previous = null)
    {
        $this->given = $given;
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $class = $trace[1]['class'];
        $type = $trace[1]['type'];
        $function = $trace[1]['function'];
        $line = $trace[1]['line'];
        $message = "Unexpected param was given: {$this->given} in {$class}{$type}{$function}() line:{$line}\n";
        parent::__construct($message, $code, $previous);
    }
}
