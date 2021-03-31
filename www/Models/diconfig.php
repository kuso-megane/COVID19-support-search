<?php

use domain\article\_list\RepositoryPort\AllArticleInfosRepositoryPort;
use domain\article\_list\RepositoryPort\ArticleCategoryListRepositoryPort;
use domain\components\searchBox\RepositoryPort\TroubleNameListRepositoryPort;
use domain\search\result\RepositoryPort\MetaTroubleRepositoryPort;
use domain\search\result\RepositoryPort\SearchedSupportsRepositoryPort;
use infra\Repository\ArticleCategoryRepository;
use infra\Repository\ArticleRepository;
use infra\Repository\SupportOrgsRepository;
use infra\Repository\TroubleListRepository;

return [
    TroubleNameListRepositoryPort::class => \DI\create(TroubleListRepository::class),
    MetaTroubleRepositoryPort::class => \DI\create(TroubleListRepository::class),

    SearchedSupportsRepositoryPort::class => \DI\create(SupportOrgsRepository::class),

    AllArticleInfosRepositoryPort::class => \DI\create(ArticleRepository::class),

    ArticleCategoryListRepositoryPort::class => \DI\create(ArticleCategoryRepository::class)
];
