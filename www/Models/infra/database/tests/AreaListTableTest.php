<?php

use infra\database\src\AreaListTable;
use myapp\myFrameWork\DB\Connection;
use myapp\myFrameWork\DB\MyDbh;
use PHPUnit\Framework\TestCase;

class AreaListTableTest extends TestCase
{
    const TABLENAME = 'AreaList';

    const SAMPLE_ID = 1;
    const FAKE_ID = 100;
    const SAMPLE_DATAS = [
        ['id' => self::SAMPLE_ID, 'name' => '東京都'],
        ['id' => self::SAMPLE_ID + 1, 'name' => '京都府']
    ];

    private $dbh;
    private $table;

    protected function setup():void
    {
        $this->dbh = (new Connection(TRUE))->connect();
        $this->table = new AreaListTable(TRUE);

        $this->dbh->truncate(self::TABLENAME);

        $sth = $this->dbh->insert(self::TABLENAME, ':id, :name',[], MyDbh::ONLY_PREPARE);
        foreach (self::SAMPLE_DATAS as $sampleData) {
            $sth->execute([':id' => $sampleData['id'], ':name' => $sampleData['name']]);
        }
    }


    public function testFindAll()
    {
        $expected = self::SAMPLE_DATAS;

        $this->assertSame(
            $expected,
            $this->table->findAll()
        );
    }


    /**
     * @dataProvider providerForFindById()
     */
    public function testFindById(int $id)
    {
        if ($id === self::FAKE_ID) {
            $expected = NULL;
        }
        else {
            $expected = [
                'id' => self::SAMPLE_DATAS[0]['id'],
                'name' => self::SAMPLE_DATAS[0]['name']
            ];
        }

        $this->assertSame($expected, $this->table->findById($id));
    }


    public function providerForFindById(): array
    {
        return [
            'when existent id is given' => [self::SAMPLE_ID],
            'when no-existent id is given' => [self::FAKE_ID]
        ];
    }
}
