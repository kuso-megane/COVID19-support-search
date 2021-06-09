<?php

namespace infra\Repository\backyardArticle\edit;

use domain\backyardArticle\edit\RepositoryPort\ArticleCategoryNamesRepositoryPort;
use domain\backyardArticle\edit\Data\ArticleCategoryName;
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