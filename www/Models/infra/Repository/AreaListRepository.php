<?php

namespace infra\Repository;

use domain\search\result\RepositoryPort\SearchedAreaNameRepositoryPort;
use infra\database\src\AreaListTable;

class AreaListRepository
implements
    SearchedAreaNameRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new AreaListTable();
    }


    /**
     * @inheritDoc
     */
    public function getSearchedAreaName(int $area_id): string
    {
        $data = $this->table->findById($area_id);

        return $data['name'];
    }
}
