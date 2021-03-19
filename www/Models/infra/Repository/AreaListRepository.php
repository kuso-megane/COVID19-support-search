<?php

namespace infra\Repository;

use domain\components\searchBox\Data\Area;
use infra\database\src\AreaListTable;

class AreaListRepository
{
    private $table;

    public function __construct()
    {
        $this->table = new AreaListTable();
    }

}
