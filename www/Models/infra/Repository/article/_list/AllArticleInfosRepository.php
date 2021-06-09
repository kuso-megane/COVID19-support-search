<?php

namespace infra\Repository\article\_list;

use domain\article\_list\RepositoryPort\AllArticleInfosRepositoryPort;
use domain\article\_list\Data\ArticleInfo;
use infra\database\src\ArticleTable;

class AllArticleInfosRepository implements AllArticleInfosRepositoryPort
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
                $articleInfo['thumbnailName'], $articleInfo['c_id']
            );
        }

        return $articleInfos;
    }
}
