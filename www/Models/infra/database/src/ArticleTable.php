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
     *          'c_id' => int
     *      ],
     *      []
     * ]
     */
    public function findAllInfos(): array
    {
        return $this->dbh->select('id, title, thumbnailName, c_id', $this::TABLENAME, '',
        ['orderby' => 'id', 'sort' => 'ASC']);
    }


    /**
     * return some columns(called Info in this app) of given category sorted by id in ascending order
     * @param int $c_id
     * @param int $maxNum
     * 
     * @return array [
     *      [
     *          'id' => int,
     *          'title' => string,
     *          'thumbnailName' => string
     *      ],
     *      []
     * ]
     * 
     * if no record is found, this returns empty array
     */
    public function findInfosByC_id(int $c_id, int $maxNum): array
    {
        return $this->dbh->select('id, title, thumbnailName', $this::TABLENAME, 'c_id = :c_id',
        ['orderby' => 'id', 'sort' => 'ASC', 'limitNum' => ':limitNum'],
        [':c_id' => $c_id, ':limitNum' => $maxNum]);
    }


    /**
     * return the record of given id
     * @param int $id
     * @param bool $is_content_needed
     * 
     * @return NULL|array [
     *      'id' => int,
     *      'title' => string,
     *      'thumbnailName' => string,
     *      'content' => string,
     *      'c_id' => int
     * ]
     * 
     * if no record is found, returns NULL
     */
    public function findById(int $id, bool $is_content_needed = TRUE): ?array
    {
        if ($is_content_needed === TRUE) {
            $columns = '*';
        }
        elseif($is_content_needed === FALSE) {
            $columns = 'id, title, thumbnailName, c_id';
        }

        return $this->dbh->select($columns, $this::TABLENAME, 'id = :id', [], [':id' => $id])[0];
    }
}
