<?php

use domain\article\_list\RepositoryPort\AllArticleInfosRepositoryPort;
use domain\article\_list\RepositoryPort\ArticleCategoryListRepositoryPort;
use domain\article\show\RepositoryPort\ArticleContentRepositoryPort;
use domain\backyardArticle\index\RepositoryPort\ArticleBYInfosRepositoryPort;
use domain\backyardArticle\index\RepositoryPort\ArticleCategoryNamesRepositoryPort as BYArticleIndexArticleCategoryNamesRepositoryPort;
use domain\backyardArticle\edit\RepositoryPort\ArticleCategoryNamesRepositoryPort as BYArticleEditArticleCategoryNamesRepositoryPort;
use domain\components\searchBox\RepositoryPort\TroubleNameListRepositoryPort;
use domain\search\result\RepositoryPort\RecommendedArticleInfosRepositoryPort;
use domain\search\result\RepositoryPort\SearchedAreaNameRepositoryPort;
use domain\search\result\RepositoryPort\SearchItemsRepositoryPort;
use domain\search\result\RepositoryPort\SearchedSupportsRepositoryPort;
use infra\Repository\AreaListRepository;
use infra\Repository\ArticleCategoryRepository;
use infra\Repository\ArticleRepository;
use infra\Repository\SupportOrgsRepository;
use infra\Repository\TroubleListRepository;

return [
    TroubleNameListRepositoryPort::class => \DI\create(TroubleListRepository::class),
    SearchItemsRepositoryPort::class => \DI\create(TroubleListRepository::class),

    SearchedSupportsRepositoryPort::class => \DI\create(SupportOrgsRepository::class),

    AllArticleInfosRepositoryPort::class => \DI\create(ArticleRepository::class),
    RecommendedArticleInfosRepositoryPort::class => \DI\create(ArticleRepository::class),
    ArticleContentRepositoryPort::class => \DI\create(ArticleRepository::class),
    ArticleBYInfosRepositoryPort::class => \DI\create(ArticleRepository::class),

    ArticleCategoryListRepositoryPort::class => \DI\create(ArticleCategoryRepository::class),
    BYArticleIndexArticleCategoryNamesRepositoryPort::class => \DI\create(ArticleCategoryRepository::class),
    BYArticleEditArticleCategoryNamesRepositoryPort::class => \DI\create(ArticleCategoryRepository::class),

    SearchedAreaNameRepositoryPort::class => \DI\create(AreaListRepository::class)
];
