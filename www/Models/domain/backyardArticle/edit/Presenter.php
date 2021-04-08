<?php

namespace domain\backyardArticle\edit;

use domain\backyardArticle\edit\Data\OldArticleContent;
use myapp\config\AppConfig;

class Presenter
{
    /**
     * @param OldArticleContent $oldArticleContent
     * 
     * @return array [
     *      'oldArticleContent' => [
     *          'id' => int,
     *          'title' => string,
     *          'thumbnailName' => string,
     *          'content' => string,
     *          'c_id' => int
     *      ] or empty array,
     * ]
     */
    public function present(?OldArticleContent $oldArticleContent): array
    {
        $oldArticleContent = ($oldArticleContent != NULL) ? $oldArticleContent->toArray() : [];

        return compact(['oldArticleContent']);
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