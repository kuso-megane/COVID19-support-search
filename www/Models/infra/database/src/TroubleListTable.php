<?php

namespace infra\database\src;

use myapp\myFrameWork\DB\Connection;

class TroubleListTable
{
    const TABLENAME = 'TroubleList';

    private $dbh;

    public function __construct(bool $is_test = FALSE, string $username = 'root')
    {
        $this->dbh = (new Connection($is_test, $username))->connect();
    }

    /**
     * return all records of TroubleList in ascending order except the columns whose xxx_isNeeded is FALSE
     * @param bool $meta_word_is_needed
     * 
     * @return array [
     *      ['id' => int, 'name' => string, 'meta_word' => string, 'ArticleC_id' => int],
     *      []
     * ]
     */
    public function findAll(bool $meta_word_isNeeded = TRUE): array
    {
        if ($meta_word_isNeeded === TRUE) {
            $columns = 'id, name, meta_word, ArticleC_id';

            return $this->dbh->select($columns, $this::TABLENAME, '', ['orderby' => 'id', 'sort' => 'ASC']);
        }
        elseif ($meta_word_isNeeded === FALSE) {
            $columns = 'id, name, ArticleC_id';

            return $this->dbh->select($columns, $this::TABLENAME, '', ['orderby' => 'id', 'sort' => 'ASC']);
        }
    }


    /**
     * @param int $trouble_id
     * 
     * @return NULL|array [
     *      'id' => int,
     *      'name' => string,
     *      'meta_word' => string,
     *      'ArticleC_id' => int
     * ]
     * 
     * If no record is found, return NULL
     */
    public function findById(int $trouble_id): ?array
    {
        return
        $this->dbh->select(
            '*', $this::TABLENAME, 'id = :id', ['orderby' => 'id', 'sort' => 'ASC'],
            [':id' => $trouble_id]
        )[0];
    }


    /**
     * @param string $name
     * @param string $meta_word
     * @param int $articleC_id
     * 
     * if something goes wrong, this throws PDOExeption
     */
    public function create(string $name, $meta_word, int $articleC_id)
    {
        $columns = '0, :name, :meta_word, :ArticleC_id';
        $boundColumns = [
            ':name' => $name,
            ':meta_word' => $meta_word,
            ':ArticleC_id' => $articleC_id 
        ];

        $this->dbh->insert(self::TABLENAME, $columns, $boundColumns);
    }


    /**
     * @param int $id
     * @param string $name
     * @param string $meta_word
     * @param int $articleC_id
     * 
     * if something goes wrong, this throws PDOExeption
     */
    public function update(int $id, string $name, $meta_word, int $articleC_id)
    {
        $columns = 'name = :name, meta_word = :meta_word, ArticleC_id = :ArticleC_id';
        $boundValues = [
            ':id' => $id,
            ':name' => $name,
            ':meta_word' => $meta_word,
            ':ArticleC_id' => $articleC_id 
        ];

        $this->dbh->update(self::TABLENAME, $columns, 'id = :id', $boundValues);
    }

}
