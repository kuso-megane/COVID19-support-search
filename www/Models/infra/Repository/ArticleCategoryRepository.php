<?php

namespace infra\Repository;

use domain\article\_list\Data\ArticleCategory as ArticleList_ArticleCategory;
use domain\article\_list\RepositoryPort\ArticleCategoryListRepositoryPort;
use domain\backyardArticleCategory\edit\Data\ArticleCategory as BYArticleCategoryEdit_ArticleCategory;
use domain\backyardArticleCategory\edit\RepositoryPort\ArticleCategoryRepositoryPort;
use domain\components\articleCategoryNames\Data\ArticleCategoryName;
use domain\components\articleCategoryNames\RepositoryPort\ArticleCategoryNamesRepositoryPort;
use infra\database\src\ArticleCategoryTable;

class ArticleCategoryRepository
implements
    ArticleCategoryListRepositoryPort,
    ArticleCategoryNamesRepositoryPort,
    ArticleCategoryRepositoryPort
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
            $category = new ArticleList_ArticleCategory($category['id'], $category['name']);
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


    /**
     * @inheritDoc
     */
    public function getArticleCategory(int $id): ?BYArticleCategoryEdit_ArticleCategory
    {
        $record = $this->table->findById($id);

        return new BYArticleCategoryEdit_ArticleCategory(
            $record['id'],
            $record['name']
        );
    }
}
