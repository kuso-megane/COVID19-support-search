<?php

namespace domain\article\_list\RepositoryPort;

use domain\article\_list\Data\ArticleInfo;

interface AllArticleInfosRepositoryPort
{
    /**
     * 
     * @return ArticleInfo[]
     */
    public function getAllArticleInfos(): array;
}
