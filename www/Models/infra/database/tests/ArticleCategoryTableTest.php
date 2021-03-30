<?php

use infra\database\src\ArticleCategoryTable;
use myapp\myFrameWork\DB\Connection;
use myapp\myFrameWork\DB\MyDbh;
use PHPUnit\Framework\TestCase;

class ArticleCategoryTableTest extends TestCase
{
    const TABLENAME = 'ArticleCategory';

    const SAMPLE_DATAS = [
        ['id' => 1, 'name' => 'sample1'],
        ['id' => 2, 'name' => 'sample2']
    ];


    private $table;
    private $dbh;

    protected function setup(): void
    {
        $this->dbh = (new Connection(TRUE))->connect();
        $this->table = new ArticleCategoryTable(TRUE);

        $this->dbh->truncate($this::TABLENAME);

        $sth = $this->dbh->insert($this::TABLENAME, ':id, :name', [], MyDbh::ONLY_PREPARE);
        foreach ($this::SAMPLE_DATAS as $sampleData) {
            $sth->execute([':id' => $sampleData['id'], ':name' => $sampleData['name']]);
        }
    }


    public function testFindAll()
    {
        $expected = [
            ['id' => 1, 'name' => $this::SAMPLE_DATAS[0]['name']],
            ['id' => 2, 'name' => $this::SAMPLE_DATAS[1]['name']]
        ];

        $this->assertSame($expected, $this->table->findAll());
    }
}
