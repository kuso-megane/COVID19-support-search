<?php

namespace infra\database\src;

use myapp\myFrameWork\DB\Connection;


class SearchLogTable
{

    const TABLENAME = 'SearchLog';

    private $dbh;

    public function __construct(bool $is_test = FALSE, string $username = 'root')
    {
        $this->dbh = (new Connection($is_test, $username))->connect();
    }

    /**
     * @param int $trouble_id
     * @param int $area_id
     * @param bool $is_only_foreign_ok
     * 
     * if something goes wrong, this throws PDOExeption
     */
    public function create(int $trouble_id, int $area_id, bool $is_only_foreign_ok)
    {
        $columns = 'trouble_id = :trouble_id, area_id = :area_id, is_only_foreign_ok = :is_only_foreign_ok';
        $boundValues = [':trouble_id' => $trouble_id, ':area_id' => $area_id, ':is_foreign_ok' => $is_only_foreign_ok];

        $this->dbh->insert($this::TABLENAME, $columns, $boundValues);
    }
}