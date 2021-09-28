<?php

namespace domain\search\index;

use myapp\config\AppConfig;

class Presenter
{
    /**
     * @param array $searchBoxData
     * @param array $articles
     * 
     * @return array
     * [
     *      'articles' => [
     *          ['id' => int, 'thumbnailName' => string, 'title' => string],
     *          []
     *      ]
     * ]
     * + $searchBoxData
     */
    public function present(array $searchBoxData, array $articles):array
    {
        return array_merge(['articles' => $this->format($articles)], $searchBoxData);
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


    private function format(array $datas): array
    {
        foreach ($datas as &$data) {
            if ($data !== NULL) {
                $data = $data->toArray();
            }
        }

        return $datas;
    }
}