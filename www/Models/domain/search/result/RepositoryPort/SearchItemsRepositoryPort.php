<?php

namespace domain\search\result\RepositoryPort;

use domain\search\result\Data\SearchItems;

interface SearchItemsRepositoryPort
{
    /**
     * @param int $trouble_id
     * 
     * @return SearchItems|NULL
     */
    public function getSearchItems(int $trouble_id):?SearchItems;
}
