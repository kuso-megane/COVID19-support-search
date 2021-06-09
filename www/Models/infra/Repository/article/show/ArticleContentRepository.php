<?php

namespace infra\Repository\article\show;

use domain\article\show\RepositoryPort\ArticleContentRepositoryPort;
use domain\article\show\Data\ArticleContent;
use infra\database\src\ArticleTable;

class ArticleContentRepository implements ArticleContentRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new ArticleTable;
    }


    /**
     * @inheritDoc
     */
    public function getArticleContent(int $article_id): ?ArticleContent
    {
        $articleContent = $this->table->findById($article_id);

        if ($articleContent === NULL) {
            return NULL;
        }
        else {
            return new ArticleContent(
                $articleContent['title'],
                $articleContent['thumbnailName'],
                $articleContent['content'],
                $articleContent['ogp_description']
            );
        }
    }
}