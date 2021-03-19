<?php

namespace infra\database\src;

use myapp\myFrameWork\DB\Connection;

class AreaListTable
{
    const TABLENAME = 'AreaList';

    private $dbh;

    public function __construct(bool $is_test = FALSE, string $username = 'root')
    {
        $this->dbh = (new Connection($is_test, $username))->connect();
    }


    /**
     * find all records sorted by id in ascending orderx
     * @return array [
     *      ['id' => int, 'name' => string],
     *      []
     * ]
     * 
     */
    public function findAll(): array
    {
        $records = $this->dbh->select('*', $this::TABLENAME, '', ['orderby' => 'id', 'sort' => 'ASC']);

        return $records;
    }
}
