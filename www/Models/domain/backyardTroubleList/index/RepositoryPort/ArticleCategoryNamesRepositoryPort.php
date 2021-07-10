<?php

namespace domain\backyardTroubleList\index\RepositoryPort;

interface ArticleCategoryNamesRepositoryPort
{
    /**
     * @return ArticleCategoryName[]
     */
    public function getArticleCategoryNames(): array;
}
