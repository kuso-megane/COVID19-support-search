<?php

namespace domain\search\index\RepositoryPort;

interface RecommendedArticleInfosRepositoryPort
{
    /**
     * return articleInfos of given category. 
     * @param int $c_id
     * @param int $maxNum the max num of getting article infos
     * 
     * @return RecommendedArticleInfo[]
     */
    public function getRecommendedArticleInfos(int $maxNum): array;
}