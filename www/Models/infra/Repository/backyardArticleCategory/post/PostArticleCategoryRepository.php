<?php

namespace infra\Repository\backyardArticleCategory\post;

use domain\backyardArticleCategory\post\RepositoryPort\PostArticleCategoryRepositoryPort;
use infra\database\src\ArticleCategoryTable;
use PDOException;

class PostArticleCategoryRepository implements PostArticleCategoryRepositoryPort
{
    private $table;
    
    public function __construct()
    {
        $this->table = new ArticleCategoryTable;
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