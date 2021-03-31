<?php

namespace infra\Repository;

use domain\article\_list\Data\ArticleCategory;
use domain\article\_list\RepositoryPort\ArticleCategoryListRepositoryPort;
use infra\database\src\ArticleCategoryTable;

class ArticleCategoryRepository
implements
    ArticleCategoryListRepositoryPort
{
    private $table;
    
    public function __construct()
    {
        $this->table = new ArticleCategoryTable;
    }


    /**
     * @inheritDoc
     */
    public function getCategoryList(): array
    {
        $categories = $this->table->findAll();

        foreach ($categories as &$category) {
            $category = new ArticleCategory($category['id'], $category['name']);
        }

        return $categories;
    }
}
