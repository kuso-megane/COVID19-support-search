<?php

namespace domain\backyardArticle\index\RepositoryPort;

use domain\backyardArticle\index\Data\ArticleBYInfo;

interface ArticleBYInfosRepositoryPort
{
    /**
     * @return ArticleBYInfo[]
     */
    public function getArticleBYInfos() :array;
}
