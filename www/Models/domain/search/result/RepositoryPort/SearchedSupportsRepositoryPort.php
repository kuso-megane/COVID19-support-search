<?php

namespace domain\search\result\RepositoryPort;

use domain\search\result\Data\SearchedSupport;
use domain\search\result\Data\SearchItems;

interface SearchedSupportsRepositoryPort
{
    /**
     * search the supports which meets given condition including 'zenkoku' ones
     * 
     * @param int &$total total num of coming up supports
     * @param string $metaWord
     * @param int $area_id
     * @param bool $is_only_foreign_ok
     * @param bool $is_public
     * 
     * this is whether the datas you want are public ones or not. Don't mistake this for $is_public_page in Interactor
     * 
     * @param int $page
     * 
     * @return SearchedSupport[]
     * 
     * if no record is found, this returns empty array.
     */
    public function searchSupports(int &$total, string $metaWord, int $area_id, bool $is_only_foreign_ok, bool $is_public, int $page):array;

}
