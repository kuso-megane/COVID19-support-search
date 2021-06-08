<?php

namespace domain\backyardArticle\index\RepositoryPort;

interface ArticleCategoryNamesRepositoryPort
{
    /**
     * @return ArticleCategoryName[]
     */
    public function getArticleCategoryNames(): array;
}
