<?php

namespace domain\backyardArticleCategory\index\RepositoryPort;

interface ArticleCategoryListRepositoryPort
{
    /**
     * @return ArticleCategory[]
     */
    public function getArticleCategoryList(): array;
}
