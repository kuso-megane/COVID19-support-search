<?php

namespace domain\backyardTroubleList\post\RepositoryPort;

interface PostTroubleRepositoryPort
{
    /**
     * @param int|NULL $id
     * @param string $name
     * @param string $meta_word
     * @param int $articleC_id
     * 
     * @return bool
     * 
     * return whether post succeeded or not
     */
    public function postTrouble(?int $id, string $name, string $meta_word, int $articleC_id): bool;
}