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
     *      'meta_word' => string
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
}
