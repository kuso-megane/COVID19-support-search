<?php

namespace domain\search\result\RepositoryPort;

interface SearchedAreaNameRepositoryPort
{
    /**
     * @param int $area_id
     * 
     * @return string
     */
    public function getSearchedAreaName(int $area_id): string;
}
