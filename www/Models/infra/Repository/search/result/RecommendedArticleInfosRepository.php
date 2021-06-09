<?php

namespace infra\Repository\search\result;

use domain\search\result\RepositoryPort\RecommendedArticleInfosRepositoryPort;
use domain\search\result\Data\RecommendedArticleInfo;
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