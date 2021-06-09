<?php

namespace domain\backyardArticleCategory\edit\RepositoryPort;

use domain\backyardArticleCategory\edit\Data\OldArticleCategory;

interface OldArticleCategoryRepositoryPort
{
    /**
     * @param int $id
     * 
     * @return ArticleCategory|NULL
     * if no data is found, this returns NULL
     */
    public function getOldArticleCategory(int $id): ?OldArticleCategory;
}