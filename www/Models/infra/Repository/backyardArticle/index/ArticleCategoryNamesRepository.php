<?php

namespace infra\Repository\backyardArticle\index;

use domain\backyardArticle\index\RepositoryPort\ArticleCategoryNamesRepositoryPort;
use domain\backyardArticle\index\Data\ArticleCategoryName;
use infra\database\src\ArticleCategoryTable;

class ArticleCategoryNamesRepository implements ArticleCategoryNamesRepositoryPort
{
    private $table;
    
    public function __construct()
    {
        $this->table = new ArticleCategoryTable;
    }


    /**
     * @inheritDoc
     */
    public function getArticleCategoryNames(): array
    {
        $records = $this->table->findAll();

        foreach ($records as &$record) {
            $record = new ArticleCategoryName($record['id'], $record['name']);
        }

        return $records;
    }
}