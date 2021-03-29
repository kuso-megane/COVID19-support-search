<?php

namespace domain\article\_list\RepositoryPort;

interface CategoryListRepositoryPort
{

    /**
     * @return ArticleCategory[]
     */
    public function getCategoryList(): array;
}
