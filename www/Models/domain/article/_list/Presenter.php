<?php

namespace domain\article\_list;

use domain\article\_list\Data\ArticleInfo;
use domain\article\_list\Data\ArticleCategory;

class Presenter
{
    /**
     * @param ArticleInfo[] $articleInfos
     * @param ArticleCategory[] $categoryList
     * 
     * 
     * @return array [
     *      'articleInfos' => [
     *          'category1' => [
     *              [
     *                  'id' => int,
     *                  'title' => string,
     *                  'thumbnailName' => string,
     *                  'c_id' => int
     *              ],
     *              []
     *          ],
     *          'category2' =>[],
     *      ]
     * ]
     */
    public function present(array $articleInfos, array $categoryList):array
    {
        return [
            'articleInfos' => $this->formatForArticleInfos($articleInfos, $categoryList)
        ];
    }


    private function formatForArticleInfos(array $articleInfos, $categoryList):array
    {
        $ans = [];

        $categoryListFormatted = [];

        foreach($categoryList as $category) {
            $category = $category->toArray();
            $id = $category['id'];
            $categoryListFormatted[$id] = $category['name'];
        }

        foreach($articleInfos as $articleInfo) {
            $data = $articleInfo->toArray();
            $c_id = $data['c_id'];
            $categoryName = $categoryListFormatted[$c_id];

            if ($ans[$categoryName] === NULL) {
                $ans[$categoryName] = [];
            }

            array_push($ans[$categoryName], $data);
        }


        return $ans;
    }
}
