<?php

namespace infra\Repository\backyardArticle\index;

use domain\backyardArticle\index\RepositoryPort\ArticleBYInfosRepositoryPort as RepositoryPortArticleBYInfosRepositoryPort;
use domain\backyardArticle\index\Data\ArticleBYInfo;
use infra\database\src\ArticleTable;

class ArticleBYInfosRepository implements RepositoryPortArticleBYInfosRepositoryPort
{

    private $table;

    public function __construct()
    {
        $this->table = new ArticleTable;
    }


    /**
     * @inheritDoc
     */
    public function getArticleBYInfos(): array
    {
        $records = $this->table->findAllInfos();

        foreach ($records as &$record) {
            $record = new ArticleBYInfo(
                $record['id'],
                $record['title'],
                $record['c_id'],
                $record['ogp_description']
            );
        }

        return $records;
    }
}