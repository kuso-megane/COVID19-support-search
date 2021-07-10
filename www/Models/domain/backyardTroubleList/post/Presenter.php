<?php

namespace domain\backyardTroubleList\post;

use myapp\config\AppConfig;

class Presenter
{

    /**
     * @param bool $isSuccess
     * @param string $message
     * 
     * @return array [
     *      'inSuccess' => bool,
     *      'message' => string
     * ]
     */
    public function present(bool $isSuccess, string $message = ''): array
    {
        if ($isSuccess === TRUE) {
            http_response_code(201);
            
        }
        else {
            http_response_code(403);
            
        }

        return compact('isSuccess', 'message');
    }



    /**
     * @param string $message
     * 
     * @return int AppConfig::INVALID_PARAMS
     */
    public function reportValidationFailure(string $message = 'Invalid url was given'): int
    {
        http_response_code(400);
        echo $message;
        return AppConfig::INVALID_PARAMS;
    }


    /**
     * @param string $message
     * 
     * @return int AppConfig::INVALID_PARAMS
     */
    public function reportNotFound(string $message = 'Requested resource was not found'): int
    {
        http_response_code(404);
        echo $message;
        return AppConfig::INVALID_PARAMS;
    }


    /**
     * @param string $message
     * 
     * @return int AppConfig::INVALID_ACCESS
     */
    public function reportInvalidAccess(string $message = 'The necessary token not found. This is probably invalid form')
    {
        http_response_code(403);
        echo $message;
        return AppConfig::INVALID_ACCESS;
    }

}