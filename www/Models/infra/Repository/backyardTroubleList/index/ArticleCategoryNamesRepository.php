<?php

namespace infra\Repository\backyardTroubleList\index;

use domain\backyardTroubleList\index\RepositoryPort\ArticleCategoryNamesRepositoryPort;
use domain\backyardTroubleList\index\Data\ArticleCategoryName;
use infra\database\src\ArticleCategoryTable;

class ArticleCategoryNamesRepository implements ArticleCategoryNamesRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new ArticleCategoryTable();
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