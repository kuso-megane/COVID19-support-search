<?php

namespace infra\Repository;

use domain\article\_list\Data\ArticleCategory;
use domain\article\_list\RepositoryPort\ArticleCategoryListRepositoryPort;
use domain\backyardArticle\index\Data\ArticleCategoryName;
use domain\backyardArticle\index\RepositoryPort\ArticleCategoryNamesRepositoryPort as BYArticleIndexArticleCategoryNamesRepositoryPort;
use domain\backyardArticle\edit\RepositoryPort\ArticleCategoryNamesRepositoryPort as BYArticleEditArticleCategoryNamesRepositoryPort;
use infra\database\src\ArticleCategoryTable;

class ArticleCategoryRepository
implements
    ArticleCategoryListRepositoryPort,
    BYArticleIndexArticleCategoryNamesRepositoryPort,
    BYArticleEditArticleCategoryNamesRepositoryPort
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
