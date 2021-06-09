<?php

namespace infra\Repository\backyardArticleCategory\edit;

use domain\backyardArticleCategory\edit\RepositoryPort\OldArticleCategoryRepositoryPort;
use domain\backyardArticleCategory\edit\Data\OldArticleCategory;
use infra\database\src\ArticleCategoryTable;

class OldArticleCategoryRepository implements OldArticleCategoryRepositoryPort
{
    private $table;
    
    public function __construct()
    {
        $this->table = new ArticleCategoryTable;
    }


    /**
     * @inheritDoc
     */
    public function getOldArticleCategory(int $id): ?OldArticleCategory
    {
        $record = $this->table->findById($id);

        return new OldArticleCategory(
            $record['id'],
            $record['name']
        );
    }
}