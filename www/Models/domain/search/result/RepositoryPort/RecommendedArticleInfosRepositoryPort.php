<?php

namespace domain\search\result\RepositoryPort;

use domain\search\result\Data\RecommendedArticleInfo;

interface RecommendedArticleInfosRepositoryPort
{
    /**
     * return articleInfos of given category. 
     * @param int $c_id
     * @param int $maxNum the max num of getting article infos
     * 
     * @return RecommendedArticleInfo[]
     */
    public function getRecommendedArticleInfos(int $c_id, int $maxNum): array;
}
