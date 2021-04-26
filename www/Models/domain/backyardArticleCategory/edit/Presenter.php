<?php

namespace domain\backyardArticleCategory\edit;

use myapp\config\AppConfig;
use domain\backyardArticleCategory\edit\Data\ArticleCategory;

class Presenter
{
    /**
     * @param ArticleCategory $articleCategory
     * 
     * @return array [
     *      'articleCategory' => [
     *          'id' => int,
     *          'name' => string
     *      ] or empty array,
     *      'csrfToken' => string
     * ]
     */
    public function present(?ArticleCategory $articleCategory, string $csrfToken): array
    {
        $articleCategory = ($articleCategory !== NULL) ? $articleCategory->toArray() : [];

        return compact('articleCategory', 'csrfToken');
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