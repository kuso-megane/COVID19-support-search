<?php

namespace domain\article\_list\RepositoryPort;

interface ArticleCategoryListRepositoryPort
{

    /**
     * @return ArticleCategory[]
     */
    public function getCategoryList(): array;
}
