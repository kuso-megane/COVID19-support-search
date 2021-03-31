<?php

use infra\database\src\ArticleTable;
use myapp\myFrameWork\DB\Connection;
use myapp\myFrameWork\DB\MyDbh;
use PHPUnit\Framework\TestCase;

class ArticleTableTest extends TestCase
{
    const TABLENAME = 'Article';
    const PARENTTABLE1 = 'ArticleCategory';

    const SAMPLE_C_ID = 1;
    const SAMPLE_PARENT1_DATAS = [
        ['id' => self::SAMPLE_C_ID, 'name' => 'sample1']
    ];
    
    const SAMPLE_DATAS = [
        ['id' => 1, 'title' => 'sampleTitle1', 'thumbnailName' => 'sampleThumbNail1',
        'content' => 'sampleContent1', 'category_id' => self::SAMPLE_C_ID],
        ['id' => 2, 'title' => 'sampleTitle2', 'thumbnailName' => 'sampleThumbNail2',
        'content' => 'sampleContent2', 'category_id' => self::SAMPLE_C_ID]
    ];

    private $dbh;
    private $table;

    protected function setup(): void
    {
        $this->dbh = (new Connection(TRUE))->connect();
        $this->table = new ArticleTable(TRUE);

        $this->dbh->truncate($this::PARENTTABLE1);
        $this->dbh->truncate($this::TABLENAME);

        $this->dbh->insert($this::PARENTTABLE1, ':id, :name',
        [':id' => $this::SAMPLE_PARENT1_DATAS[0]['id'], ':name' => $this::SAMPLE_PARENT1_DATAS[0]['name']]);

        $sth = $this->dbh->insert($this::TABLENAME, ':id, :title, :thumbnailName, :content, :category_id', [], MyDbh::ONLY_PREPARE);
        foreach ($this::SAMPLE_DATAS as $sampleData) {
            $sth->execute([
                ':id' => $sampleData['id'], ':title' => $sampleData['title'],
                ':thumbnailName' => $sampleData['thumbnailName'], ':content' => $sampleData['content'],
                ':category_id' => $sampleData['category_id']
            ]);
        }
    }


    public function testFindAllInfos()
    {
        $expected = [
            ['id' => $this::SAMPLE_DATAS[0]['id'], 'title' => $this::SAMPLE_DATAS[0]['title'],
            'thumbnailName' => $this::SAMPLE_DATAS[0]['thumbnailName'], 'category_id' => $this::SAMPLE_DATAS[0]['category_id']],
            ['id' => $this::SAMPLE_DATAS[1]['id'], 'title' => $this::SAMPLE_DATAS[1]['title'],
            'thumbnailName' => $this::SAMPLE_DATAS[1]['thumbnailName'], 'category_id' => $this::SAMPLE_DATAS[1]['category_id']]
        ];

        $this->assertSame($expected, $this->table->findAllInfos());
    }
}
