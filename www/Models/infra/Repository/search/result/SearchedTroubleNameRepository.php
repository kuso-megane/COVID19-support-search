<?php

namespace infra\Repository\search\result;

use domain\search\result\RepositoryPort\SearchedTroubleNameRepositoryPort;
use infra\database\src\TroubleListTable;

class SearchedTroubleNameRepository implements SearchedTroubleNameRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new TroubleListTable();
    }


    /**
     * @inheritDoc
     */
    public function getSearchedTroubleName(int $id): string
    {
        return $this->table->findById($id)['name'];
    }
}