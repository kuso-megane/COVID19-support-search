<?php

namespace domain\backyardArticle\edit\RepositoryPort;

interface ArticleCategoryNamesRepositoryPort
{
    /**
     * @return ArticleCategoryName[]
     */
    public function getArticleCategoryNames(): array;
}
