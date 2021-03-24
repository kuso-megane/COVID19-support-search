<?php

namespace infra\database\src;

use myapp\myFrameWork\DB\Connection;

class SupportOrgsTable
{
    const TABLENAME = 'SupportOrgs';

    private $dbh;

    public function __construct(bool $is_test = FALSE, string $username = 'root')
    {
        $this->dbh = (new Connection($is_test, $username))->connect();
    }


    /**
     * return the records in SupportOrgs table meeting given condition sorted by id in ascending order.
     * @param string $meta_word
     * @param int $area_id
     * @param bool $is_only_foreign_ok
     * @param bool $is_public
     * @param int $maxNumPerPage
     * @param int $page
     * 
     * @return NULL|array [
     *      'id' => int
     *      'support_content' => string,
     *      'owner' => string,
     *      'access' => string,
     *      'appendix' => string|NULL
     * ]
     * if no record is found, this returns empty array.
     */
    public function findSearchedOnes(string $meta_word, int $area_id, bool $is_only_foreign_ok, bool $is_public, int $maxNumPerPage, int $page): ?array
    {
        $columns = 'id, support_content, owner, access, appendix';
        $is_public = ($is_public === TRUE) ? 1 : 0;
        $condition = 'meta_words LIKE :meta_word AND area_id = :area_id';
        $limitStart = $maxNumPerPage * ($page - 1);

        if ($is_only_foreign_ok === TRUE ) {
            $condition .= ' AND is_foreign_ok = 1 AND is_public = :is_public';
        }
        elseif ($is_only_foreign_ok === FALSE) {
            $condition .= ' AND is_public = :is_public';
        }

        $boundValues = [':meta_word' => "%{$meta_word}%", ':area_id' => $area_id, ':is_public' => $is_public];

        $records = $this->dbh
        ->select($columns, $this::TABLENAME, $condition,
        ['orderby' => 'id', 'sort' => 'ASC', 'limitStart' => $limitStart, 'limitNum' => $maxNumPerPage], $boundValues);

        return $records;
    }
}
