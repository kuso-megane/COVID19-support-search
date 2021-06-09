<?php

use domain\adminLogin\authenticate\RepositoryPort\AdminLoginInfoRepositoryPort;
use domain\article\_list\RepositoryPort\AllArticleInfosRepositoryPort;
use domain\article\_list\RepositoryPort\ArticleCategoryListRepositoryPort;
use domain\article\show\RepositoryPort\ArticleContentRepositoryPort;
use domain\backyardArticle\index\RepositoryPort\ArticleBYInfosRepositoryPort;
use domain\backyardArticle\edit\RepositoryPort\OldArticleContentRepositoryPort;
use domain\backyardArticle\post\RepositoryPort\PostArticleRepositoryPort;
use domain\backyardArticleCategory\edit\RepositoryPort\OldArticleCategoryRepositoryPort;
use domain\backyardArticleCategory\post\RepositoryPort\PostArticleCategoryRepositoryPort;
use domain\components\searchBox\RepositoryPort\TroubleNameListRepositoryPort;
use domain\search\result\RepositoryPort\RecommendedArticleInfosRepositoryPort;
use domain\search\result\RepositoryPort\SearchedAreaNameRepositoryPort;
use domain\search\result\RepositoryPort\SearchItemsRepositoryPort;
use domain\search\result\RepositoryPort\SearchedSupportsRepositoryPort;
use domain\backyardArticle\index\RepositoryPort\ArticleCategoryNamesRepositoryPort as BYArticleIndexArticleCategoryNamesRepositoryPort;
use domain\backyardArticle\edit\RepositoryPort\ArticleCategoryNamesRepositoryPort as BYArticleEditArticleCategoryNamesRepositoryPort;
use domain\backyardArticleCategory\index\RepositoryPort\ArticleCategoryListRepositoryPort as BYArticleCategoryIndexArticleCategoryListRepositoryPort;
use domain\backyardTroubleList\index\RepositoryPort\ArticleCategoryNamesRepositoryPort as BYTroubleListIndexArticleCategoryNamesRepositoryPort;
use domain\backyardTroubleList\index\RepositoryPort\TroubleListRepositoryPort;


use infra\Repository\adminLogin\authenticate\AdminLoginInfoRepository;
use infra\Repository\article\_list\AllArticleInfosRepository;
use infra\Repository\article\_list\ArticleCategoryListRepository;
use infra\Repository\article\show\ArticleContentRepository;
use infra\Repository\backyardArticle\index\ArticleBYInfosRepository;
use infra\Repository\backyardArticle\index\ArticleCategoryNamesRepository as BYArticleIndexArticleCategoryNamesRepository;
use infra\Repository\backyardArticle\edit\OldArticleContentRepository;
use infra\Repository\backyardArticle\edit\ArticleCategoryNamesRepository as BYArticleEditArticleCategoryNamesRepository;
use infra\Repository\backyardArticle\post\PostArticleRepository;
use infra\Repository\backyardArticleCategory\edit\OldArticleCategoryRepository;
use infra\Repository\backyardArticleCategory\post\PostArticleCategoryRepository;
use infra\Repository\backyardArticleCategory\index\ArticleCategoryListRepository as BYArticleCategoryIndexArticleCategoryListRepository;
use infra\Repository\backyardTroubleList\index\TroubleListRepository;
use infra\Repository\components\searchBox\TroubleNameListRepository;
use infra\Repository\search\result\RecommendedArticleInfosRepository;
use infra\Repository\search\result\SearchedAreaNameRepository;
use infra\Repository\search\result\SearchedSupportsRepository;
use infra\Repository\search\result\SearchItemsRepository;
use infra\Repository\backyardTroubleList\index\ArticleCategoryNamesRepository as BYTroubleListIndexArticleCategoryNamesRepository;


return [
    TroubleNameListRepositoryPort::class => \DI\create(TroubleNameListRepository::class),
    SearchItemsRepositoryPort::class => \DI\create(SearchItemsRepository::class),
    TroubleListRepositoryPort::class => \DI\create(TroubleListRepository::class),

    SearchedSupportsRepositoryPort::class => \DI\create(SearchedSupportsRepository::class),

    AllArticleInfosRepositoryPort::class => \DI\create(AllArticleInfosRepository::class),
    RecommendedArticleInfosRepositoryPort::class => \DI\create(RecommendedArticleInfosRepository::class),
    ArticleContentRepositoryPort::class => \DI\create(ArticleContentRepository::class),
    ArticleBYInfosRepositoryPort::class => \DI\create(ArticleBYInfosRepository::class),
    OldArticleContentRepositoryPort::class => \DI\create(OldArticleContentRepository::class),
    PostArticleRepositoryPort::class => \DI\create(PostArticleRepository::class),

    ArticleCategoryListRepositoryPort::class => \DI\create(ArticleCategoryListRepository::class),
    BYArticleIndexArticleCategoryNamesRepositoryPort::class => \DI\create(BYArticleIndexArticleCategoryNamesRepository::class),
    BYArticleEditArticleCategoryNamesRepositoryPort::class => \DI\create(BYArticleEditArticleCategoryNamesRepository::class),
    OldArticleCategoryRepositoryPort::class => \DI\create(OldArticleCategoryRepository::class),
    PostArticleCategoryRepositoryPort::class => \DI\create(PostArticleCategoryRepository::class),
    BYArticleCategoryIndexArticleCategoryListRepositoryPort::class => \DI\create(BYArticleCategoryIndexArticleCategoryListRepository::class),
    BYTroubleListIndexArticleCategoryNamesRepositoryPort::class => \DI\create(BYTroubleListIndexArticleCategoryNamesRepository::class),

    SearchedAreaNameRepositoryPort::class => \DI\create(SearchedAreaNameRepository::class),

    AdminLoginInfoRepositoryPort::class => \DI\create(AdminLoginInfoRepository::class)
];
