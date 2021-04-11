<?php

namespace domain\backyardArticleCategory\edit\RepositoryPort;

use domain\backyardArticleCategory\edit\Data\ArticleCategory;

interface ArticleCategoryRepositoryPort
{
    /**
     * @param int $id
     * 
     * @return ArticleCategory|NULL
     * if no data is found, this returns NULL
     */
    public function getArticleCategory(int $id): ?ArticleCategory;
}