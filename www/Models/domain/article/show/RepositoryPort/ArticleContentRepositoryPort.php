<?php

namespace domain\article\show\RepositoryPort;

use domain\article\show\Data\ArticleContent;

interface ArticleContentRepositoryPort
{
    /**
     * @param int $article_id
     * 
     * @return ArticleContent|NULL
     * 
     * if no article is found, return NULL
     */
    public function getArticleContent(int $article_id): ?ArticleContent;
}
