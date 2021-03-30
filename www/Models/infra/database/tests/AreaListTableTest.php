<?php

use infra\database\src\AreaListTable;
use myapp\myFrameWork\DB\Connection;
use myapp\myFrameWork\DB\MyDbh;
use PHPUnit\Framework\TestCase;

class AreaListTableTest extends TestCase
{
    const TABLENAME = 'AreaList';

    const samplePrefectures = ['東京都', '京都府'];

    private $dbh;
    private $table;

    protected function setup():void
    {
        $this->dbh = (new Connection(TRUE))->connect();
        $this->table = new AreaListTable(TRUE);

        $this->dbh->truncate($this::TABLENAME);

        $sth = $this->dbh->insert($this::TABLENAME, '0, :name',[], MyDbh::ONLY_PREPARE);
        $sth->bindValue(':name', $this::samplePrefectures[0]);
        $sth->execute();
        $sth->bindValue(':name', $this::samplePrefectures[1]);
        $sth->execute();
    }


    public function testFindAll()
    {
        $expected = [
            ['id' => 1, 'name' => $this::samplePrefectures[0]],
            ['id' => 2, 'name' => $this::samplePrefectures[1]]
        ];

        $this->assertSame(
            $expected,
            $this->table->findAll()
        );
    }
}
