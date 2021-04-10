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

    const FAKE_ID = 100; //存在しないカテゴリのid


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


    /**
     * @dataProvider providerForFindById()
     */
    public function testFindById(bool $isFound)
    {
        if ($isFound === TRUE) {
            $id = 1;
            $expected = [
                'id' => 1, 'name' => $this::SAMPLE_DATAS[0]['name']
            ];
        }
        else {
            $id = self::FAKE_ID;
            $expected = NULL;
        }
        
        $this->assertSame($expected, $this->table->findById($id));
    }


    public function testCreate()
    {
        $newId = count(self::SAMPLE_DATAS) + 1;
        $newName = 'new name';

        $this->table->create($newName);

        $expected = [
            'id' => $newId,
            'name' => $newName
        ];
        $this->assertSame($expected,
            $this->dbh->select('*', self::TABLENAME, "id = {$newId}")[0]);
    }


    public function testUpdate()
    {
        $id = 1;
        $newName = 'new name';

        $this->table->update($id, $newName);

        $expected = [
            'id' => $id,
            'name' => $newName
        ];
        $this->assertSame($expected,
            $this->dbh->select('*', self::TABLENAME, "id = {$id}")[0]);
    }


    public function providerForFindById():array
    {
        return [
            'when existent id is given' => [TRUE],
            'when no-existent id is given' => [FALSE]
        ];
    }
}
