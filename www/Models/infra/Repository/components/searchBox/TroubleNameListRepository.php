<?php

namespace infra\Repository\components\searchBox;

use domain\components\searchBox\RepositoryPort\TroubleNameListRepositoryPort;
use domain\components\searchBox\Data\TroubleName;
use infra\database\src\TroubleListTable;

class TroubleNameListRepository implements TroubleNameListRepositoryPort
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