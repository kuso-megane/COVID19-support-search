<?php

namespace infra\Repository;

use domain\components\searchBox\RepositoryPort\TroubleNameListRepositoryPort;
use infra\database\src\TroubleListTable;

class TroubleListRepository
implements TroubleNameListRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new TroubleListTable();
    }


    /**
     * @inheritDoc
     */
    public function getTroubleNameList(): array
    {
        $records = $this->table->findAll(FALSE);

        return $records;
    }
}
