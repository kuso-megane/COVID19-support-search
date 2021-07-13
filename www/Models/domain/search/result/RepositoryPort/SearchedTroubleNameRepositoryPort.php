<?php

namespace domain\search\result\RepositoryPort;

interface SearchedTroubleNameRepositoryPort
{

    /**
     * @param int $id
     * 
     * @return string
     */
    public function getSearchedTroubleName(int $id): string;
}