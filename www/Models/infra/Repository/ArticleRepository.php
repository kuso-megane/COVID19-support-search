<?php

namespace infra\Repository;

use domain\article\_list\Data\ArticleInfo;
use domain\article\_list\RepositoryPort\AllArticleInfosRepositoryPort;
use infra\database\src\ArticleTable;

class ArticleRepository
implements
    AllArticleInfosRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new ArticleTable;
    }


    /**
     * @inheritDoc
     */
    public function getAllArticleInfos(): array
    {
        $articleInfos = $this->table->findAllInfos();

        foreach ($articleInfos as &$articleInfo) {
            $articleInfo = new ArticleInfo(
                $articleInfo['id'], $articleInfo['title'], 
                $articleInfo['thumbnailName'], $articleInfo['category_id']
            );
        }

        return $articleInfos;
    }
}
