<?php

namespace domain\backyardArticle\edit;

use domain\backyardArticle\edit\Data\OldArticleContent;
use myapp\config\AppConfig;

class Presenter
{
    /**
     * @param bool $isNew
     * @param OldArticleContent $oldArticleContent
     * @param ArticleCategoryName[] $articleCategoryNames
     * 
     * @return array [
     *      'isNew' => bool,
     *      'oldArticleContent' => [
     *          'id' => int,
     *          'title' => string,
     *          'thumbnailName' => string,
     *          'content' => string,
     *          'c_id' => int
     *      ] or empty array,
     *      'articleCategoryNames' => [
     *          ['id' => int, 'name' => string]
     *      ]
     * ]
     */
    public function present(bool $isNew, ?OldArticleContent $oldArticleContent, array $articleCategoryNames): array
    {
        $oldArticleContent = ($oldArticleContent != NULL) ? $oldArticleContent->toArray() : [];
        $articleCategoryNames = $this->format($articleCategoryNames);

        return compact(['isNew', 'oldArticleContent', 'articleCategoryNames']);
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