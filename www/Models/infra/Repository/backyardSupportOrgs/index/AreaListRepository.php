<?php

namespace infra\Repository\backyardSupportOrgs\index;

use domain\backyardSupportOrgs\index\RepositoryPort\AreaListRepositoryPort;
use infra\database\src\AreaListTable;
use domain\backyardSupportOrgs\index\Data\Area;

class AreaListRepository implements AreaListRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new AreaListTable();
    }

    /**
     * @inheritDoc
     */
    public function getAreaList(): array
    {
        $records = $this->table->findAll();

        foreach ($records as &$record) {
            $record = new Area($record['id'], $record['name']);
        }

        return $records;
    }
}