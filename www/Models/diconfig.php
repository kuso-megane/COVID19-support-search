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
use domain\backyardArticle\index\RepositoryPort\ArticleCategoryNamesRepositoryPort as BYArticleIndexArticleCategoryNamesRepositoryPort;
use domain\backyardArticle\edit\RepositoryPort\ArticleCategoryNamesRepositoryPort as BYArticleEditArticleCategoryNamesRepositoryPort;
use infra\Repository\adminLogin\authenticate\AdminLoginInfoRepository;
use infra\Repository\article\_list\AllArticleInfosRepository;
use infra\Repository\article\_list\ArticleCategoryListRepository;
use infra\Repository\article\show\ArticleContentRepository;
use infra\Repository\backyardArticle\index\ArticleBYInfosRepository;
use infra\Repository\backyardArticle\index\ArticleCategoryNamesRepository as BYArticleIndexArticleCategoryNamesRepository;
use infra\Repository\backyardArticle\edit\OldArticleContentRepository;
use infra\Repository\backyardArticle\edit\ArticleCategoryNamesRepository as BYArticleEditArticleCategoryNamesRepository;


use infra\Repository\AreaListRepository;
use infra\Repository\ArticleCategoryRepository;
use infra\Repository\ArticleRepository;
use infra\Repository\SupportOrgsRepository;
use infra\Repository\TroubleListRepository;

return [
    TroubleNameListRepositoryPort::class => \DI\create(TroubleListRepository::class),
    SearchItemsRepositoryPort::class => \DI\create(TroubleListRepository::class),

    SearchedSupportsRepositoryPort::class => \DI\create(SupportOrgsRepository::class),

    AllArticleInfosRepositoryPort::class => \DI\create(AllArticleInfosRepository::class),
    RecommendedArticleInfosRepositoryPort::class => \DI\create(ArticleRepository::class),
    ArticleContentRepositoryPort::class => \DI\create(ArticleContentRepository::class),
    ArticleBYInfosRepositoryPort::class => \DI\create(ArticleBYInfosRepository::class),
    OldArticleContentRepositoryPort::class => \DI\create(OldArticleContentRepository::class),
    PostArticleRepositoryPort::class => \DI\create(ArticleRepository::class),

    ArticleCategoryListRepositoryPort::class => \DI\create(ArticleCategoryListRepository::class),
    BYArticleIndexArticleCategoryNamesRepositoryPort::class => \DI\create(BYArticleIndexArticleCategoryNamesRepository::class),
    BYArticleEditArticleCategoryNamesRepositoryPort::class => \DI\create(BYArticleEditArticleCategoryNamesRepository::class),
    ArticleCategoryRepositoryPort::class => \DI\create(ArticleCategoryRepository::class),
    PostArticleCategoryRepositoryPort::class => \DI\create(ArticleCategoryRepository::class),

    SearchedAreaNameRepositoryPort::class => \DI\create(AreaListRepository::class),

    AdminLoginInfoRepositoryPort::class => \DI\create(AdminLoginInfoRepository::class)
];
