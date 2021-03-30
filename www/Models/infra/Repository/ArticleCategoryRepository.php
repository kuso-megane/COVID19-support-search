<?php

namespace infra\Repository;

use domain\article\_list\Data\ArticleCategory;
use domain\article\_list\RepositoryPort\CategoryListRepositoryPort;
use infra\database\src\ArticleCategoryTable;

class ArticleCategoryRepository
implements
    CategoryListRepositoryPort
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
        $categories = $this->table->findAllNames();

        foreach ($categories as &$category) {
            $category = new ArticleCategory($category['id'], $category['name']);
        }

        return $categories;
    }
}
