<?php

namespace infra\database\src;

use myapp\myFrameWork\DB\Connection;

class ArticleTable
{
    const TABLENAME = 'Article';

    private $dbh;

    public function __construct(bool $is_test = FALSE, string $username = 'root')
    {
        $this->dbh = (new Connection($is_test, $username))->connect();
    }


    /**
     * return some columns(called Info in this app) of all records sorted by id in ascending order
     * @return array [
     *      [
     *          'id' => int,
     *          'title' => string,
     *          'thumbnailName' => string,
     *          'category_id' => int
     *      ],
     *      []
     * ]
     */
    public function findAllInfos(): array
    {
        return $this->dbh->select('id, title, thumbnailName, category_id', $this::TABLENAME, '',
        ['orderby' => 'id', 'sort' => 'ASC']);
    }
}
