<?php

use infra\database\src\TroubleListTable;
use myapp\myFrameWork\DB\Connection;
use myapp\myFrameWork\DB\MyDbh;
use PHPUnit\Framework\TestCase;

class TroubleListTableTest extends TestCase
{
    const TABLENAME = 'TroubleList';
    const PARENT_TABLE1 = 'ArticleCategory';

    const SAMPLE_ARTICLE_C_ID = 1;
    const PARENT1_SAMPLE_DATAS = [
        ['id' => self::SAMPLE_ARTICLE_C_ID, 'name' => 'sampleC1']
    ];

    const SAMPLE_DATAS = [
        ['name' => 'sampleTrouble1', 'meta_word' => 'meta1', 'ArticleC_id' => self::SAMPLE_ARTICLE_C_ID],
        ['name' => 'sampleTrouble2', 'meta_word' => 'meta2', 'ArticleC_id' => self::SAMPLE_ARTICLE_C_ID]
    ];

    private $dbh;
    private $table;

    protected function setup():void
    {
        $this->dbh = (new Connection(TRUE))->connect();
        $this->table = new TroubleListTable(TRUE);

        $this->dbh->truncate($this::TABLENAME);

        $sth = $this->dbh->insert($this::TABLENAME, '0, :name, :meta_word, :ArticleC_id', [], MyDbh::ONLY_PREPARE);
        foreach ($this::SAMPLE_DATAS as $sampleData) {
            $sth->execute([
                ':name' => $sampleData['name'],
                ':meta_word' => $sampleData['meta_word'],
                ':ArticleC_id' => $sampleData['ArticleC_id']
            ]);
        }
    }


    /**
     * @dataProvider providerForFindAll()
     */
    public function testFindAll(bool $meta_word_isNeeded = TRUE)
    {
        if ($meta_word_isNeeded === TRUE) {

            $expected = [
                ['id' => 1, 'name' => $this::SAMPLE_DATAS[0]['name'],
                'meta_word' => $this::SAMPLE_DATAS[0]['meta_word'], 'ArticleC_id' => $this::SAMPLE_DATAS[0]['ArticleC_id']],
                ['id' => 2, 'name' => $this::SAMPLE_DATAS[1]['name'],
                'meta_word' => $this::SAMPLE_DATAS[1]['meta_word'], 'ArticleC_id' => $this::SAMPLE_DATAS[1]['ArticleC_id']]
            ];

            $this->assertSame($expected, $this->table->findAll(TRUE));
        }
        elseif ($meta_word_isNeeded === FALSE) {

            $expected = [
                ['id' => 1, 'name' => $this::SAMPLE_DATAS[0]['name'], 'ArticleC_id' => $this::SAMPLE_DATAS[0]['ArticleC_id']],
                ['id' => 2, 'name' => $this::SAMPLE_DATAS[1]['name'], 'ArticleC_id' => $this::SAMPLE_DATAS[1]['ArticleC_id']]
            ];

            $this->assertSame($expected, $this->table->findAll(FALSE));
        }

    }


    /**
     * @dataProvider providerForFindByid()
     */
    public function testFindById(bool $found_flag)
    {
        $id = 1;
        $fake_id = 100;

        if ($found_flag === TRUE) {

            $expected = [
                'id' => $id,
                'name' => $this::SAMPLE_DATAS[0]['name'],
                'meta_word' => $this::SAMPLE_DATAS[0]['meta_word'],
                'ArticleC_id' => $this::SAMPLE_DATAS[0]['ArticleC_id']
            ];

            $this->assertSame($expected, $this->table->findById($id));
        }
        elseif ($found_flag === FALSE) {

            $expected = NULL;

            $this->assertSame($expected, $this->table->findById($fake_id));
        }
 
    }


    public function providerForFindAll():array
    {
    
        return [
            'when meta_word is needed' => [TRUE],
            'when meta_word is not needed' => [FALSE]
        ];
    }


    public function providerForFindById():array
    {
        return [
            'when a record is found' => [TRUE],
            'when no record is found' => [FALSE]
        ];
    }
}
