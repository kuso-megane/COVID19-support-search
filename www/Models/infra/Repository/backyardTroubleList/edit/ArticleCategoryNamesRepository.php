<?php

namespace infra\Repository\backyardTroubleList\edit;

use domain\backyardTroubleList\edit\RepositoryPort\ArticleCategoryNamesRepositoryPort;
use infra\database\src\ArticleCategoryTable;
use domain\backyardTroubleList\edit\Data\ArticleCategoryName;

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