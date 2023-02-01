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
use domain\search\result\RepositoryPort\RecommendedArticleInfosRepositoryPort as SearchResultRecommendedArticleInfosRepositoryPort;
use domain\search\result\RepositoryPort\SearchedAreaNameRepositoryPort;
use domain\search\result\RepositoryPort\SearchItemsRepositoryPort;
use domain\search\result\RepositoryPort\SearchedSupportsRepositoryPort as SearchResultSearchedSupportsRepositoryPort;
use domain\backyardSupportOrgs\index\RepositoryPort\SearchedSupportsRepositoryPort as BYSupportOrgsIndexSearchedSupportsRepositoryPort;
use domain\backyardArticle\index\RepositoryPort\ArticleCategoryNamesRepositoryPort as BYArticleIndexArticleCategoryNamesRepositoryPort;
use domain\backyardArticle\edit\RepositoryPort\ArticleCategoryNamesRepositoryPort as BYArticleEditArticleCategoryNamesRepositoryPort;
use domain\backyardArticleCategory\index\RepositoryPort\ArticleCategoryListRepositoryPort as BYArticleCategoryIndexArticleCategoryListRepositoryPort;
use domain\backyardSupportOrgs\index\RepositoryPort\AreaListRepositoryPort as BYSupportOrgsIndexAreaListRepositoryPort;
use domain\backyardSupportOrgs\edit\RepositoryPort\OldSupportOrgRepositoryPort;
use domain\backyardSupportOrgs\edit\RepositoryPort\AreaListRepositoryPort as BYSupportOrgsEditAreaListRepositoryPort;
use domain\backyardSupportOrgs\post\RepositoryPort\PostSupportOrgsRepositoryPort;
use domain\backyardTroubleList\edit\RepositoryPort\OldTroubleRepositoryPort;
use domain\backyardTroubleList\index\RepositoryPort\ArticleCategoryNamesRepositoryPort as BYTroubleListIndexArticleCategoryNamesRepositoryPort;
use domain\backyardTroubleList\index\RepositoryPort\TroubleListRepositoryPort;
use domain\backyardTroubleList\edit\RepositoryPort\ArticleCategoryNamesRepositoryPort as BYTroubleListEditArticleCategoryNamesRepositoryPort;
use domain\backyardTroubleList\post\RepositoryPort\PostTroubleRepositoryPort;
use domain\search\result\RepositoryPort\SearchedTroubleNameRepositoryPort;
use domain\search\index\RepositoryPort\RecommendedArticleInfosRepositoryPort as SearchIndexRecommendedArticleInfosRepositoryPort;
use domain\search\result\RepositoryPort\SearchLogRepositoryPort;


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
use infra\Repository\backyardSupportOrgs\index\AreaListRepository as BYSupportOrgsIndexAreaListRepository;
use infra\Repository\backyardSupportOrgs\edit\OldSupportOrgRepository;
use infra\Repository\backyardSupportOrgs\edit\AreaListRepository as BYSupportOrgsEditAreaListRepository;
use infra\Repository\backyardTroubleList\edit\OldTroubleRepository;
use infra\Repository\backyardTroubleList\index\TroubleListRepository;
use infra\Repository\components\searchBox\TroubleNameListRepository;
use infra\Repository\search\result\RecommendedArticleInfosRepository as SearchResultRecommendedArticleInfosRepository;
use infra\Repository\search\result\SearchedAreaNameRepository;
use infra\Repository\search\result\SearchedSupportsRepository as SearchResultSearchedSupportsRepository;
use infra\Repository\backyardSupportOrgs\index\SearchedSupportsRepository as BYSupportOrgsIndexSearchedSupportsRepository;
use infra\Repository\search\result\SearchItemsRepository;
use infra\Repository\backyardTroubleList\index\ArticleCategoryNamesRepository as BYTroubleListIndexArticleCategoryNamesRepository;
use infra\Repository\backyardTroubleList\edit\ArticleCategoryNamesRepository as BYTroubleListEditArticleCategoryNamesRepository;
use infra\Repository\backyardTroubleList\post\PostTroubleRepository;
use infra\Repository\backyardSupportOrgs\post\PostSupportOrgsRepository;
use infra\Repository\search\result\SearchedTroubleNameRepository;
use infra\Repository\search\index\RecommendedArticleInfosRepository as SearchIndexRecommendedArticleInfosRepository;
use infra\Repository\search\result\SearchLogRepository;

return [
    TroubleNameListRepositoryPort::class => \DI\create(TroubleNameListRepository::class),
    SearchItemsRepositoryPort::class => \DI\create(SearchItemsRepository::class),
    TroubleListRepositoryPort::class => \DI\create(TroubleListRepository::class),
    OldTroubleRepositoryPort::class => \DI\create(OldTroubleRepository::class),
    PostTroubleRepositoryPort::class => \DI\create(PostTroubleRepository::class),
    SearchedTroubleNameRepositoryPort::class => \DI\create(SearchedTroubleNameRepository::class),

    SearchResultSearchedSupportsRepositoryPort::class => \DI\create(SearchResultSearchedSupportsRepository::class),
    BYSupportOrgsIndexSearchedSupportsRepositoryPort::class => \DI\create(BYSupportOrgsIndexSearchedSupportsRepository::class),
    OldSupportOrgRepositoryPort::class => \DI\create(OldSupportOrgRepository::class),
    PostSupportOrgsRepositoryPort::class => \DI\create(PostSupportOrgsRepository::class),

    AllArticleInfosRepositoryPort::class => \DI\create(AllArticleInfosRepository::class),
    SearchResultRecommendedArticleInfosRepositoryPort::class => \DI\create(SearchResultRecommendedArticleInfosRepository::class),
    ArticleContentRepositoryPort::class => \DI\create(ArticleContentRepository::class),
    ArticleBYInfosRepositoryPort::class => \DI\create(ArticleBYInfosRepository::class),
    OldArticleContentRepositoryPort::class => \DI\create(OldArticleContentRepository::class),
    PostArticleRepositoryPort::class => \DI\create(PostArticleRepository::class),
    SearchIndexRecommendedArticleInfosRepositoryPort::class => \DI\create(SearchIndexRecommendedArticleInfosRepository::class),

    ArticleCategoryListRepositoryPort::class => \DI\create(ArticleCategoryListRepository::class),
    BYArticleIndexArticleCategoryNamesRepositoryPort::class => \DI\create(BYArticleIndexArticleCategoryNamesRepository::class),
    BYArticleEditArticleCategoryNamesRepositoryPort::class => \DI\create(BYArticleEditArticleCategoryNamesRepository::class),
    OldArticleCategoryRepositoryPort::class => \DI\create(OldArticleCategoryRepository::class),
    PostArticleCategoryRepositoryPort::class => \DI\create(PostArticleCategoryRepository::class),
    BYArticleCategoryIndexArticleCategoryListRepositoryPort::class => \DI\create(BYArticleCategoryIndexArticleCategoryListRepository::class),
    BYTroubleListIndexArticleCategoryNamesRepositoryPort::class => \DI\create(BYTroubleListIndexArticleCategoryNamesRepository::class),
    BYTroubleListEditArticleCategoryNamesRepositoryPort::class => \DI\create(BYTroubleListEditArticleCategoryNamesRepository::class),

    SearchedAreaNameRepositoryPort::class => \DI\create(SearchedAreaNameRepository::class),
    BYSupportOrgsIndexAreaListRepositoryPort::class => \DI\create(BYSupportOrgsIndexAreaListRepository::class),
    BYSupportOrgsEditAreaListRepositoryPort::class => \DI\create(BYSupportOrgsEditAreaListRepository::class),

    AdminLoginInfoRepositoryPort::class => \DI\create(AdminLoginInfoRepository::class),

    SearchLogRepositoryPort::class => \DI\create(SearchLogRepository::class)
];
