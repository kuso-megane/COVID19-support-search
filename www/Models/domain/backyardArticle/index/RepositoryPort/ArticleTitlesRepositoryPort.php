<?php

namespace domain\backyardArticle\index\RepositoryPort;

use domain\backyardArticle\index\Data\ArticleTitle;

interface ArticleTitlesRepositoryPort
{
    /**
     * @return ArticleTitle[]
     */
    public function getArticleTitles() :array;
}
