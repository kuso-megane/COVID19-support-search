<?php

namespace domain\backyardArticle\post\RepositoryPort;

interface PostArticleRepositoryPort
{
    /**
     * @param int|NULL $artcl_id
     * @param string $title
     * @param string $thumbnailName
     * @param string $content
     * @param int $c_id
     * 
     * @return bool whether post succeeds or not
     * 
     * if something goes wrong, throw PDOException
     */
    public function postArticle(?int $artcl_id, string $title, string $thumbnailName, string $content, int $c_id): bool;

}