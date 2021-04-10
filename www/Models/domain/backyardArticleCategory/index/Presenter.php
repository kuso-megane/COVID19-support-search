<?php

namespace domain\backyardArticleCategory;

class Presenter
{
    /**
     * @param ArticleCategoryName[] $articleCategoryNames
     * 
     * @return array [
     * 
     *      'articleCategoryNames' => [
     *          [
     *              'id' => int,
     *              'name' => string
     *          ],
     *          []
     *      ]
     * ]
     */
    public function present(array $articleCategoryNames):array
    {
        $articleCategoryNames = $this->format($articleCategoryNames);

        return compact('articleCategoryNames');
    }


    private function format(array $datas)
    {
        foreach ($datas as &$data) {
            $data = $data->toArray();
        }

        return $datas;
    }
}
