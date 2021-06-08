<?php

namespace infra\Repository\backyardArticleCategory\edit;

use domain\backyardArticleCategory\edit\RepositoryPort\ArticleCategoryRepositoryPort;
use domain\backyardArticleCategory\edit\Data\ArticleCategory;
use infra\database\src\ArticleCategoryTable;

class ArticleCategoryRepository implements ArticleCategoryRepositoryPort
{
    private $table;
    
    public function __construct()
    {
        $this->table = new ArticleCategoryTable;
    }


    /**
     * @inheritDoc
     */
    public function getArticleCategory(int $id): ?ArticleCategory
    {
        $record = $this->table->findById($id);

        return new ArticleCategory(
            $record['id'],
            $record['name']
        );
    }
}