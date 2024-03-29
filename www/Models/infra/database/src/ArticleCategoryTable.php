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
     * return  all records sorted by id in ascending order
     * @return array [
     *      ['id' => int, 'name' => string],
     *      []
     * ]
     */
    public function findAll() :array
    {
        return $this->dbh->select('id, name', $this::TABLENAME, '', ['orderby' => 'id', 'sort' => 'ASC']);
    }


    /**
     * return the record of given id
     * @param int $id
     * @return NULL|array [
     *      'id' => int,
     *      'name' => string
     * ]
     * 
     * if no record is found, this returns NULL
     */
    public function findById(int $id): ?array
    {
        return  $this->dbh->select('*', self::TABLENAME, 'id = :id', [], [':id' => $id])[0];  
    }


    /**
     * @param string $name
     * 
     * if something goes wrong, this throws PDOException
     */
    public function create(string $name)
    {
        $columns = '0, :name';
        $boundColumns = [':name' => $name];

        $this->dbh->insert(self::TABLENAME, $columns, $boundColumns);
    }


    /**
     * @param int $id
     * @param string $name
     * 
     * if something goes wrong, this throws PDOException
     */
    public function update(int $id, string $name)
    {
        $columns = 'name = :name';
        $condition = 'id = :id';
        $boundValues = [':id' => $id, ':name' => $name];

        $this->dbh->update(self::TABLENAME, $columns, $condition, $boundValues);
    }
}
