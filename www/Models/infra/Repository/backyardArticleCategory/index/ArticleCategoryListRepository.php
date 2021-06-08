<?php

namespace infra\Repository\backyardArticleCategory\index;

use domain\backyardArticleCategory\index\RepositoryPort\ArticleCategoryListRepositoryPort;
use domain\backyardArticleCategory\index\Data\ArticleCategory;
use infra\database\src\ArticleCategoryTable;

class ArticleCategoryListRepository implements ArticleCategoryListRepositoryPort
{
    private $table;
    
    public function __construct()
    {
        $this->table = new ArticleCategoryTable;
    }


    /**
     * @inheritDoc
     */
    public function getArticleCategoryList(): array
    {
        $records = $this->table->findAll();

        foreach ($records as &$record) {
            $record = new ArticleCategory($record['id'], $record['name']);
        }

        return $records;
    }
}