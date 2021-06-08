<?php

namespace infra\Repository\backyardArticle\edit;

use domain\backyardArticle\edit\RepositoryPort\OldArticleContentRepositoryPort;
use domain\backyardArticle\edit\Data\OldArticleContent;
use infra\database\src\ArticleTable;

class OldArticleContentRepository implements OldArticleContentRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new ArticleTable;
    }


    /**
     * @inheritDoc
     */
    public function getOldArticleContent(int $artcl_id): ?OldArticleContent
    {
        $record = $this->table->findById($artcl_id);

        if ($record !== NULL) {
            return new OldArticleContent(
                $record['id'],
                $record['title'],
                $record['thumbnailName'],
                $record['content'],
                $record['c_id'],
                $record['ogp_description']
            );
        }
        else {
            return NULL;
        }
    }
}
