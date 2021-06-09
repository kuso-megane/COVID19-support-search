<?php

namespace infra\Repository\search\result;

use domain\search\result\RepositoryPort\SearchedAreaNameRepositoryPort;
use infra\database\src\AreaListTable;


class SearchedAreaNameRepository implements SearchedAreaNameRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new AreaListTable;
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