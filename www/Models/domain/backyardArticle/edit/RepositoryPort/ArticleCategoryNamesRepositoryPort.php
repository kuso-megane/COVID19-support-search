<?php

namespace domain\backyardArticle\edit\RepositoryPort;

use domain\backyardArticle\edit\Data\ArticleCategoryName;

interface ArticleCategoryNamesRepositoryPort
{
    /**
     * @return ArticleCategoryName[]
     */
    public function getArticleCategoryNames(): array;
}
