<?php

namespace domain\article\show;

use myapp\config\AppConfig;
use domain\article\show\Data\ArticleContent;

class Presenter
{
    /**
     * @param ArticleContent $articleContent
     * 
     * @return array [
     *      'articleContent' => [
     *          'title' => string,
     *          'thumbnailName' => string,
     *          'content' => string,
     *          'ogp_description' => string
     *      ]
     * ]
     */
    public function present(ArticleContent $articleContent) :array
    {
        return [
            'articleContent' => $articleContent->toArray()
        ];
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
}
