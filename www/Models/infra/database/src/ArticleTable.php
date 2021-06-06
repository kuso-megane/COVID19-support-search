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
     *          'c_id' => int,
     *          'ogp_description' => string
     *      ],
     *      []
     * ]
     */
    public function findAllInfos(): array
    {
        return $this->dbh->select('id, title, thumbnailName, c_id, ogp_description', $this::TABLENAME, '',
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
            $columns = 'id, title, thumbnailName, c_id, ogp_description';
        }

        return $this->dbh->select($columns, $this::TABLENAME, 'id = :id', [], [':id' => $id])[0];
    }


    /**
     * @param string $title
     * @param string $thumbnailName
     * @param string $content
     * @param int $c_id
     * @param string $ogp_description
     * 
     * if something goes wrong, this throws PDOExeption
     */
    public function create(string $title, string $thumbnailName, string $content, int $c_id, string $ogp_description)
    {
        $columns = '0, :title, :thumbnailName, :content, :c_id, :ogp_description';
        $boundColumns = [
            ':title' => $title, ':thumbnailName' => $thumbnailName, ':content' => $content,
            ':c_id' => $c_id, ':ogp_description' => $ogp_description
        ];
        $this->dbh->insert(self::TABLENAME, $columns, $boundColumns);
    }


    /**
     * @param int $id
     * @param string $title
     * @param string $thumbnailName
     * @param string $content
     * @param int $c_id
     * @param string $ogp_description
     * 
     * if something goes wrong, this throws PDOExeption
     */
    public function update(int $id, string $title, string $thumbnailName, string $content, int $c_id, string $ogp_description)
    {
        $columns = 'title = :title, thumbnailName = :thumbnailName, content = :content, c_id = :c_id, ogp_description = :ogp_description';
        $boundValues = [':id' => $id, ':title' => $title, ':thumbnailName' => $thumbnailName,
        ':content' => $content, ':c_id' => $c_id, ':ogp_description' => $ogp_description];

        $this->dbh->update(self::TABLENAME, $columns, 'id = :id', $boundValues);
    }
}
