<?php

namespace domain\backyardArticle\post;


use myapp\config\AppConfig;

class Presenter
{
    /**
     * @param bool $isSuccess
     * 
     * @return array [
     *      'inSuccess' => int
     * ]
     */
    public function present(bool $isSuccess): int
    {
        if ($isSuccess === TRUE) {
            http_response_code(201);
            return [
                'isSuccess' => AppConfig::POST_SUCCESS
            ];
        }
        else {
            http_response_code(403);
            return [
                'isSuccess' => AppConfig::POST_FAILURE
            ];
        }
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