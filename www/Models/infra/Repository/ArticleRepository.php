<?php

namespace infra\Repository;

use domain\article\_list\Data\ArticleInfo;
use domain\article\_list\RepositoryPort\AllArticleInfosRepositoryPort;
use domain\article\show\Data\ArticleContent;
use domain\article\show\RepositoryPort\ArticleContentRepositoryPort;
use domain\backyardArticle\edit\Data\OldArticleContent;
use domain\backyardArticle\edit\RepositoryPort\OldArticleContentRepositoryPort;
use domain\backyardArticle\index\Data\ArticleBYInfo;
use domain\backyardArticle\index\RepositoryPort\ArticleBYInfosRepositoryPort;
use domain\backyardArticle\post\RepositoryPort\PostArticleRepositoryPort;
use domain\search\result\Data\RecommendedArticleInfo;
use domain\search\result\RepositoryPort\RecommendedArticleInfosRepositoryPort;
use infra\database\src\ArticleTable;
use PDOException;
use SebastianBergmann\RecursionContext\Context;

class ArticleRepository
implements
    AllArticleInfosRepositoryPort,
    RecommendedArticleInfosRepositoryPort,
    ArticleContentRepositoryPort,
    ArticleBYInfosRepositoryPort,
    OldArticleContentRepositoryPort,
    PostArticleRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new ArticleTable;
    }


    /**
     * @inheritDoc
     */
    public function getRecommendedArticleInfos(int $c_id, int $maxNum): array
    {
        $articleInfos = $this->table->findInfosByC_id($c_id, $maxNum);

        foreach ($articleInfos as &$articleInfo) {
            $articleInfo = new RecommendedArticleInfo(
                $articleInfo['id'], $articleInfo['title'], $articleInfo['thumbnailName']
            );
        }

        return $articleInfos;
    }


    






    /**
     * @inheritDoc
     */
    public function postArticle(?int $artcl_id, string $title, string $thumbnailName, string $content, int $c_id, string $ogp_description): bool
    {
        try {
            if ($artcl_id !== NULL) {
                $this->table->update($artcl_id, $title, $thumbnailName, $content, $c_id, $ogp_description);
            }
            else {
                $this->table->create($title, $thumbnailName, $content, $c_id, $ogp_description);
            }
        }
        catch (PDOException $e) {
            throw $e;
            return FALSE;
        }

        return TRUE;
    }
}
