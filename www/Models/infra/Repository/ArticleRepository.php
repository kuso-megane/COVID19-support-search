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
    public function getAllArticleInfos(): array
    {
        $articleInfos = $this->table->findAllInfos();

        foreach ($articleInfos as &$articleInfo) {
            $articleInfo = new ArticleInfo(
                $articleInfo['id'], $articleInfo['title'], 
                $articleInfo['thumbnailName'], $articleInfo['c_id']
            );
        }

        return $articleInfos;
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
    public function getArticleContent(int $article_id): ?ArticleContent
    {
        $articleContent = $this->table->findById($article_id);

        if ($articleContent === NULL) {
            return NULL;
        }
        else {
            return new ArticleContent(
                $articleContent['title'], $articleContent['thumbnailName'], $articleContent['content']
            );
        }
    }


    /**
     * @inheritDoc
     */
    public function getArticleBYInfos(): array
    {
        $records = $this->table->findAllInfos();

        foreach ($records as &$record) {
            $record = new ArticleBYInfo(
                $record['id'],
                $record['title'],
                $record['c_id']
            );
        }

        return $records;
    }


    /**
     * @inheritDoc
     */
    public function getOldArticleContent(int $artcl_id): ?OldArticleContent
    {
        $record = $this->table->findById($artcl_id);

        if ($record != NULL) {
            return new OldArticleContent(
                $record['id'],
                $record['title'],
                $record['thumbnailName'],
                $record['content'],
                $record['c_id']
            );
        }
        else {
            return NULL;
        }
    }


    /**
     * @inheritDoc
     */
    public function postArticle(?int $artcl_id, string $title, string $thumbnailName, string $content, int $c_id): bool
    {
        try {
            if ($artcl_id != NULL) {
                $this->table->update($artcl_id, $title, $thumbnailName, $content, $c_id);
            }
            else {
                $this->table->create($title, $thumbnailName, $content, $c_id);
            }
        }
        catch (PDOException $e) {
            return FALSE;
        }

        return TRUE;
    }
}
