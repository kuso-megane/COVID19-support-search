<?php

use domain\adminLogin\authenticate\RepositoryPort\AdminLoginInfoRepositoryPort;
use domain\article\_list\RepositoryPort\AllArticleInfosRepositoryPort;
use domain\article\_list\RepositoryPort\ArticleCategoryListRepositoryPort;
use domain\article\show\RepositoryPort\ArticleContentRepositoryPort;
use domain\backyardArticle\index\RepositoryPort\ArticleBYInfosRepositoryPort;
use domain\backyardArticle\edit\RepositoryPort\OldArticleContentRepositoryPort;
use domain\backyardArticle\post\RepositoryPort\PostArticleRepositoryPort;
use domain\backyardArticleCategory\edit\RepositoryPort\ArticleCategoryRepositoryPort;
use domain\backyardArticleCategory\post\RepositoryPort\PostArticleCategoryRepositoryPort;
use domain\components\searchBox\RepositoryPort\TroubleNameListRepositoryPort;
use domain\search\result\RepositoryPort\RecommendedArticleInfosRepositoryPort;
use domain\search\result\RepositoryPort\SearchedAreaNameRepositoryPort;
use domain\search\result\RepositoryPort\SearchItemsRepositoryPort;
use domain\search\result\RepositoryPort\SearchedSupportsRepositoryPort;
use infra\Repository\AdminLoginInfoRepository;
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
    OldArticleContentRepositoryPort::class => \DI\create(ArticleRepository::class),
    PostArticleRepositoryPort::class => \DI\create(ArticleRepository::class),

    ArticleCategoryListRepositoryPort::class => \DI\create(ArticleCategoryRepository::class),
    ArticleCategoryNamesRepositoryPort::class => \DI\create(ArticleCategoryRepository::class),
    ArticleCategoryRepositoryPort::class => \DI\create(ArticleCategoryRepository::class),
    PostArticleCategoryRepositoryPort::class => \DI\create(ArticleCategoryRepository::class),

    SearchedAreaNameRepositoryPort::class => \DI\create(AreaListRepository::class),

    AdminLoginInfoRepositoryPort::class => \DI\create(AdminLoginInfoRepository::class)
];
