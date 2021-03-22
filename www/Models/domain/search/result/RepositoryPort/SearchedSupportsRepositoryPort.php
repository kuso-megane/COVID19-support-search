<?php

namespace domain\search\result\RepositoryPort;

use domain\search\result\Data\SearchedSupport;
use domain\search\result\Data\MetaTrouble;

interface SearchedSupportsRepositoryPort
{
    /**
     * @param MetaTrouble $trouble_id
     * @param int $region_id
     * @param int $area_id
     * @param bool $is_foreign_ok
     * @param bool $is_public
     * 
     * this is whether the datas you want are public ones or not. Don't mistake this for $is_public_page in Interactor
     * 
     * @param int $page
     * 
     * @return SearchedSupport[]
     */
    public function searchSupports(MetaTrouble $metaTrouble, int $region_id, int $area_id, bool $is_foreign_ok, bool $is_public, int $page):array;

}
