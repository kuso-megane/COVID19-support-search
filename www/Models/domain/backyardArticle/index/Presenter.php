<?php

namespace domain\backyardArticle\index;

use myapp\config\AppConfig;
use domain\backyardArticle\index\Data\ArticleBYInfo;

class Presenter
{
    /**
     * @param ArticleBYInfo[] $articleBYInfos
     * @param ArticleCategoryName[] $articleCategoryNames
     * @return array [
     *      'articleBYInfos' => [
     *          ['id' => int, 'title' => string, 'c_id' => int, 'ogp_description' => string|NULL],
     *          []
     *      ],
     *      'articleCategoryNames' => [
     *          (int)1 => (string)title1,
     *          2 => title2
     *      ]
     * ]
     * 
     */
    public function present(array $articleBYInfos, array $articleCategoryNames) :array
    {
        $articleBYInfos = $this->format($articleBYInfos);
        $articleCategoryNames = $this->formatForArticleCategoryNames($articleCategoryNames);
        return compact(['articleBYInfos', 'articleCategoryNames']);
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

    private function formatForArticleCategoryNames(array $datas): array
    {
        $ans = [];
        foreach ($datas as $data) {
            $data = $data->toArray();
            $ans[$data['id']] = $data['name'];
        }

        return $ans;
    }
}
