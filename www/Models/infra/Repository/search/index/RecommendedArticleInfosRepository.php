<?php

namespace infra\Repository\search\index;

use domain\search\index\RepositoryPort\RecommendedArticleInfosRepositoryPort;
use domain\search\index\Data\RecommendedArticleInfo;
use infra\database\src\ArticleTable;

class RecommendedArticleInfosRepository implements RecommendedArticleInfosRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new ArticleTable;
    }


    /**
     * @inheritDoc
     */
    public function getRecommendedArticleInfos(int $c_id, int $maxNum): array
    {
        $articleInfos = $this->table->findInfosByC_id($c_id, $maxNum);

        foreach ($articleInfos as &$articleInfo) {
            $articleInfo = new RecommendedArticleInfo(
                $articleInfo['id'], $articleInfo['title'], $articleInfo['thumbnailName']
            );
        }

        return $articleInfos;
    }
}