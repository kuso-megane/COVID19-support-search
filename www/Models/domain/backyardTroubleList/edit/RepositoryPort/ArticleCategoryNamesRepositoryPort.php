<?php

namespace domain\backyardTroubleList\edit\RepositoryPort;

interface ArticleCategoryNamesRepositoryPort
{
    /**
     * @return ArticleCategoryName[]
     */
    public function getArticleCategoryNames(): array;
}