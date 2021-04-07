<?php

namespace domain\backyardArticle\index;

use myapp\config\AppConfig;
use domain\backyardArticle\index\Data\ArticleTitle;

class Presenter
{
    /**
     * @param ArticleTitle[] $articleTitles
     * @return array [
     *      'articleTitles' => [
     *          ['id' => int, 'title' => string],
     *          []
     *      ]
     * ]
     * 
     */
    public function present(array $articleTitles) :array
    {
        $articleTitles = $this->format($articleTitles);
        return compact('articleTitles');
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
