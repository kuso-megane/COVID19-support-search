<?php

namespace infra\database\src;

use myapp\myFrameWork\DB\Connection;

class ArticleCategoryTable
{
    const TABLENAME = 'ArticleCategory';

    private $dbh;

    public function __construct(bool $is_test = FALSE, string $username = 'root')
    {
        $this->dbh = (new Connection($is_test, $username))->connect();
    }


    /**
     * return id and name of all records sorted by id in ascending order
     * @return array [
     *      ['id' => int, 'name' => string],
     *      []
     * ]
     */
    public function findAll() :array
    {
        return $this->dbh->select('id, name', $this::TABLENAME, '', ['orderby' => 'id', 'sort' => 'ASC']);
    }
}
