<?php

namespace infra\Repository\backyardArticle\post;

use domain\backyardArticle\post\RepositoryPort\PostArticleRepositoryPort;
use infra\database\src\ArticleTable;
use PDOException;

class PostArticleRepository implements PostArticleRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new ArticleTable;
    }


    /**
     * @inheritDoc
     */
    public function postArticle(?int $artcl_id, string $title, string $thumbnailName, string $content, int $c_id, string $ogp_description): bool
    {
        try {
            if ($artcl_id !== NULL) {
                $this->table->update($artcl_id, $title, $thumbnailName, $content, $c_id, $ogp_description);
            }
            else {
                $this->table->create($title, $thumbnailName, $content, $c_id, $ogp_description);
            }
        }
        catch (PDOException $e) {
            throw $e;
            return FALSE;
        }

        return TRUE;
    }
}