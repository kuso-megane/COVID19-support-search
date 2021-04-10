<?php

namespace domain\backyardArticleCategory\post;

use myapp\config\AppConfig;

class Presenter
{
    /**
     * @param bool $isPostSucceeded
     * 
     * @return array [
     *      'isSucceeded' => bool
     * ]
     */
    public function present(bool $isSucceeded)
    {
        if ($isSucceeded === TRUE) {
            http_response_code(201);
            
        }
        else {
            http_response_code(403);
        }

        return compact('isSucceeded');
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


    private function format(array $datas):array
    {
        foreach($datas as &$data) {
            $data = $data->toArray();
        }

        return $datas;
    }
}