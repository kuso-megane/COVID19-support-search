<?php

namespace infra\database\src;

use myapp\config\AppConfig;
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
     * return the records in SupportOrgs table and count the total, meeting given condition sorted by area_id to put zenkoku datas behind
     * 
     * @param int &$total
     * @param string $meta_word
     * @param int $area_id
     * @param bool $is_only_foreign_ok
     * @param bool $is_public
     * @param int $maxNumPerPage to make test easy, this must not be Appconfig const vars
     * @param int $page
     * @param bool $is_necessary_zenkoku
     * 
     * @return NULL|array [
     *      'id' => int,
     *      'area_id' => int
     *      'support_content' => string,
     *      'owner' => string,
     *      'access' => string,
     *      'appendix' => string|NULL
     * ]
     * 
     * 
     * if no record is found, this returns empty array.
     */
    public function findSearchedOnes(int &$total, string $meta_word, int $area_id, bool $is_only_foreign_ok, bool $is_public, int $maxNumPerPage, int $page, bool $is_necessary_zenkoku = FALSE): ?array
    {
        $columns = 'id, area_id, support_content, owner, access, appendix';
        $is_public = ($is_public === TRUE) ? 1 : 0;
        
        if ($is_necessary_zenkoku === FALSE) {
            $condition = 'meta_words LIKE :meta_word AND area_id = :area_id';
            $area_id_sort = 'ASC';
        }
        elseif ($is_necessary_zenkoku === TRUE) {
            $zenkoku_id = AppConfig::ZENKOKU_ID;
            $condition = "meta_words LIKE :meta_word AND area_id IN (:area_id, {$zenkoku_id})";
            $area_id_sort = ($zenkoku_id <= $area_id) ? 'DESC' : 'ASC';
        }

        $limitStart = $maxNumPerPage * ($page - 1);

        if ($is_only_foreign_ok === TRUE ) {
            $condition .= ' AND is_foreign_ok = 1 AND is_public = :is_public';
        }
        elseif ($is_only_foreign_ok === FALSE) {
            $condition .= ' AND is_public = :is_public';
        }

        $boundColumns = [
            ':meta_word' => "%{$meta_word}%", ':area_id' => $area_id, ':is_public' => $is_public
        ];
        $boundValues = array_merge($boundColumns, [
            ':limitStart' => $limitStart, ':limitNum' => $maxNumPerPage
        ]);

        $records = $this->dbh
        ->select($columns, $this::TABLENAME, $condition,
        ['orderby' => "area_id {$area_id_sort}, id ASC", 'limitStart' => ':limitStart', 'limitNum' => ':limitNum'], $boundValues);

        $total = $this->dbh
        ->count('*', $this::TABLENAME, $condition, $boundColumns);

        return $records;
    }


    /**
     * 
     * return rows which owner meets given word partially 
     * 
     * @param string $owner_word
     * @param int $maxNum
     * 
     * @return array
     * [
     *      [
     *          'id' => int,
     *          'area_id' => int,
     *          'support_content' => string,
     *          'owner' => string,
     *          'access' => string,
     *          'is_foreign_ok' => 0|1,
     *          'is_public' => 0|1,
     *          'meta_words' => string,
     *          'appendix' => string
     *      ],
     *      []
     * ]
     */
    public function findByOwnerWord(string $owner_word, int $maxNum): array
    {
        $columns = '*';
        $condition = 'owner LIKE :owner_word';
        $option = [
            'limitNum' => ':limitNum'
        ];
        $boundValues = [
            ':owner_word' => "%{$owner_word}%", ':limitNum' => $maxNum
        ];
        
        $rows = $this->dbh->select($columns, self::TABLENAME, $condition, $option, $boundValues);

        return $rows;
    }


    /**
     * @param int $id
     * 
     * @return array|NULL
     * [
     *      'id' => int,
     *      'area_id' => int,
     *      'support_content' => string,
     *      'owner' => string,
     *      'access' => string,
     *      'is_foreign_ok' => 0|1,
     *      'is_public' => 0|1,
     *      'meta_words' => string,
     *      'appendix' => string
     * ]
     * 
     * if no record is found, return NULL
     */
    public function findById(int $id): ?array
    {
        $columns = '*';
        $condition = 'id = :id';
        $boundValues = [
            ':id' => $id
        ];

        return $this->dbh->select($columns, self::TABLENAME, $condition, [], $boundValues)[0];
    }


    /**
     * @param int $area_id
     * @param string $support_content
     * @param string $owner
     * @param string $access
     * @param int $is_foreign_ok  1 or 0
     * @param int $is_public  1 or 0
     * @param string $appendix
     * 
     * if something went wrong, this throws PDOException
     * 
     * 'meta_words' column will be ''
     */
    public function create(
        int $area_id, string $support_content, string $owner, string $access, int $is_foreign_ok,
        int $is_public, string $appendix
    )
    {
        $columns = ':id, :area_id, :support_content, :owner, :access, :is_foreign_ok,
        :is_public, :meta_words, :appendix';
        $meta_words = '';
        $boundColumns = [
            ':id' => 0,
            ':area_id' => $area_id,
            ':support_content' => $support_content,
            ':owner' => $owner,
            ':access' => $access,
            ':is_foreign_ok' => $is_foreign_ok,
            ':is_public' => $is_public,
            ':meta_words' => $meta_words,
            ':appendix' => $appendix
        ];
        
        $this->dbh->insert(self::TABLENAME, $columns, $boundColumns);
    }


    /**
     * @param int $id
     * @param int $area_id
     * @param string $support_content
     * @param string $owner
     * @param string $access
     * @param int $is_foreign_ok  1 or 0
     * @param int $is_public  1 or 0
     * @param string $appendix
     * 
     * if something went wrong, this throws PDOException
     */
    public function update(
        int $id, int $area_id, string $support_content, string $owner, string $access,
        int $is_foreign_ok, int $is_public, string $appendix
    )
    {
        $columns = 'area_id = :area_id, support_content = :support_content, owner = :owner,
        access = :access, is_foreign_ok = :is_foreign_ok, is_public = :is_public,
        appendix = :appendix';
        $condition = 'id = :id';
        $boundValues = [
            ':id' => $id,
            ':area_id' => $area_id,
            ':support_content' => $support_content,
            ':owner' => $owner,
            ':access' => $access,
            ':is_foreign_ok' => $is_foreign_ok,
            ':is_public' => $is_public,
            ':appendix' => $appendix
        ];

        $this->dbh->update(self::TABLENAME, $columns, $condition, $boundValues);
    }
}
