<?php

namespace domain\backyardArticleCategory\post\RepositoryPort;

interface PostArticleCategoryRepositoryPort
{
    /**
     * @param int|NULL $id
     * @param string $name
     * 
     * @return bool whether post succeeded or not
     */
    public function postArticleCategory(?int $id, string $name): bool;
}
