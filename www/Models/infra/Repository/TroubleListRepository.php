<?php

namespace infra\Repository;

use domain\components\searchBox\Data\TroubleName;
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
        $troubles = $this->table->findAll(FALSE);

        foreach($troubles as &$trouble) {
            $trouble = new TroubleName($trouble['id'], $trouble['name']);
        }

        return $troubles;
    }
}
