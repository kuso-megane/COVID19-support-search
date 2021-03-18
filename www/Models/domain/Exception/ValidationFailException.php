<?php

namespace domain\Exception;

use Exception;


class ValidationFailException extends Exception
{
    
    /**
     * @param string $problem  the explaination of problem of the given url
     */
    public function __construct(string $problem)
    {

        $message = "不正なurlです。{$problem}\n";
        parent::__construct($message);
    }
}