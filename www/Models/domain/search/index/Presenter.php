<?php

namespace domain\search\index;

use myapp\config\AppConfig;

class Presenter
{
    /**
     * @param array $searchBoxData
     * 
     * @return array
     * $searchBoxData
     */
    public function present(array $searchBoxData):array
    {
        return $searchBoxData;
    }


    /**
     * @param string $message
     * 
     * @return int AppConfig::INVALID_PARAMS
     */
    public function reportValidationFailure(string $message = 'Invalid url was given')
    {
        http_response_code(400);
        echo $message;
        return AppConfig::INVALID_PARAMS;
    }
}