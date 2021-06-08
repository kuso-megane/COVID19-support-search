<?php

namespace infra\Repository;

use domain\article\_list\Data\ArticleCategory as ArticleList_ArticleCategory;
use domain\article\_list\RepositoryPort\ArticleCategoryListRepositoryPort;
use domain\backyardArticleCategory\edit\Data\ArticleCategory as BYArticleCategoryEdit_ArticleCategory;
use domain\backyardArticleCategory\edit\RepositoryPort\ArticleCategoryRepositoryPort;
use domain\backyardArticleCategory\post\RepositoryPort\PostArticleCategoryRepositoryPort;
use infra\database\src\ArticleCategoryTable;
use PDOException;

class ArticleCategoryRepository
implements
    ArticleCategoryListRepositoryPort,
    ArticleCategoryNamesRepositoryPort,
    ArticleCategoryRepositoryPort,
    PostArticleCategoryRepositoryPort
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
    public function getArticleCategory(int $id): ?BYArticleCategoryEdit_ArticleCategory
    {
        $record = $this->table->findById($id);

        return new BYArticleCategoryEdit_ArticleCategory(
            $record['id'],
            $record['name']
        );
    }


    /**
     * @inheritDoc
     */
    public function postArticleCategory(?int $id, string $name): bool
    {
        try {
            if ($id !== NULL) {
                $this->table->update($id, $name);
            }
            else {
                $this->table->create($name);
            }
        }
        catch (PDOException $e) {
            return FALSE;
        }

        return TRUE;
        
    }
}
