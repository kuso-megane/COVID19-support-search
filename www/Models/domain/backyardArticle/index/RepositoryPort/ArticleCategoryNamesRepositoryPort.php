<?php

namespace domain\backyardArticle\index\RepositoryPort;

use domain\backyardArticle\index\Data\ArticleCategoryName;

interface ArticleCategoryNamesRepositoryPort
{
    /**
     * @return ArticleCategoryName[]
     */
    public function getArticleCategoryNames(): array;
}
