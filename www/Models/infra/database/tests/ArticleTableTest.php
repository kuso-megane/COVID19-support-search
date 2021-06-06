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
    const FAKE_C_ID = 0;
    const SAMPLE_PARENT1_DATAS = [
        ['id' => self::SAMPLE_C_ID, 'name' => 'sample1']
    ];
    
    const SAMPLE_DATAS = [
        ['id' => 1, 'title' => 'sampleTitle1', 'thumbnailName' => 'sampleThumbNail1',
        'content' => 'sampleContent1', 'c_id' => self::SAMPLE_C_ID, 'ogp_description' => 'sample_description'],
        ['id' => 2, 'title' => 'sampleTitle2', 'thumbnailName' => 'sampleThumbNail2',
        'content' => 'sampleContent2', 'c_id' => self::SAMPLE_C_ID, 'ogp_description' => NULL]
    ];

    const FAKE_ID = 100;

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

        $sth = $this->dbh->insert($this::TABLENAME, ':id, :title, :thumbnailName, :content, :c_id, :ogp_description', [], MyDbh::ONLY_PREPARE);
        foreach ($this::SAMPLE_DATAS as $sampleData) {
            $sth->execute([
                ':id' => $sampleData['id'], ':title' => $sampleData['title'],
                ':thumbnailName' => $sampleData['thumbnailName'], ':content' => $sampleData['content'],
                ':c_id' => $sampleData['c_id'], ':ogp_description' => $sampleData['ogp_description']
            ]);
        }
    }


    public function testFindAllInfos()
    {
        $expected = [
            ['id' => $this::SAMPLE_DATAS[0]['id'], 'title' => $this::SAMPLE_DATAS[0]['title'],
            'thumbnailName' => $this::SAMPLE_DATAS[0]['thumbnailName'], 'c_id' => $this::SAMPLE_DATAS[0]['c_id'],
            'ogp_description' => $this::SAMPLE_DATAS[0]['ogp_description']],
            ['id' => $this::SAMPLE_DATAS[1]['id'], 'title' => $this::SAMPLE_DATAS[1]['title'],
            'thumbnailName' => $this::SAMPLE_DATAS[1]['thumbnailName'], 'c_id' => $this::SAMPLE_DATAS[1]['c_id'],
            'ogp_description' => $this::SAMPLE_DATAS[1]['ogp_description']]
        ];

        $this->assertSame($expected, $this->table->findAllInfos());
    }


    /**
     * @dataProvider providerForFindInfosByC_id()
     */
    public function testFindInfosByC_id(int $c_id)
    {
        $maxNum_mock = 2;

        if ($c_id == self::SAMPLE_C_ID) {
            $expected = [
                ['id' => $this::SAMPLE_DATAS[0]['id'], 'title' => $this::SAMPLE_DATAS[0]['title'],
                'thumbnailName' => $this::SAMPLE_DATAS[0]['thumbnailName']],
                ['id' => $this::SAMPLE_DATAS[1]['id'], 'title' => $this::SAMPLE_DATAS[1]['title'],
                'thumbnailName' => $this::SAMPLE_DATAS[1]['thumbnailName']]
            ];
        }
        elseif($c_id == self::FAKE_C_ID) {
            $expected = [];
        }

        $this->assertSame($expected, $this->table->findInfosByC_id($c_id, $maxNum_mock));

    }


    /**
     * @dataProvider providerForFindById()
     */
    public function testFindById(int $id, bool $is_content_needed)
    {
        if ($id === 1) {
            if ($is_content_needed === FALSE) {
                $expected = [
                    'id' => $this::SAMPLE_DATAS[0]['id'], 'title' => $this::SAMPLE_DATAS[0]['title'],
                    'thumbnailName' => $this::SAMPLE_DATAS[0]['thumbnailName'], 'c_id' => $this::SAMPLE_DATAS[0]['c_id'],
                    'ogp_description' => $this::SAMPLE_DATAS[0]['ogp_description']
                ];
            }
            elseif ($is_content_needed === TRUE) {
                $expected = [
                    'id' => $this::SAMPLE_DATAS[0]['id'], 'title' => $this::SAMPLE_DATAS[0]['title'],
                    'thumbnailName' => $this::SAMPLE_DATAS[0]['thumbnailName'], 'content' => $this::SAMPLE_DATAS[0]['content'],
                    'c_id' => $this::SAMPLE_DATAS[0]['c_id'], 'ogp_description' => $this::SAMPLE_DATAS[0]['ogp_description']
                ];
            }
        }
        elseif ($id === $this::FAKE_ID) {
            $expected = NULL;
        }

        $this->assertSame($expected, $this->table->findById($id, $is_content_needed));
    }


    public function testCreate()
    {
        $newId = count(self::SAMPLE_DATAS) + 1;
        $newTitle = 'new title';
        $newThumbnailName = 'newimg.jpg';
        $newContent = 'new content';
        $newC_id = self::SAMPLE_C_ID;
        $newOgpDescription = 'new ogp description';

        $this->table->create($newTitle, $newThumbnailName, $newContent, $newC_id, $newOgpDescription);

        $expected = [
            ['id' => $newId, 'title' => $newTitle, 'thumbnailName' => $newThumbnailName,
            'content' => $newContent, 'c_id' => $newC_id, 'ogp_description' => $newOgpDescription]
        ];
        $this->assertSame($expected, $this->dbh->select('*', self::TABLENAME, "id = {$newId}"));
    }


    public function testUpdate()
    {
        $id = 1;
        $newTitle = 'new Title';
        $newThumbnailName = 'newimg.jpg';
        $newContent = 'new content';
        $newC_id = self::SAMPLE_C_ID;
        $newOgpDescription = 'new ogp description';

        $this->table->update($id, $newTitle, $newThumbnailName, $newContent, $newC_id, $newOgpDescription);

        $expected = [
            ['id' => $id, 'title' => $newTitle, 'thumbnailName' => $newThumbnailName,
            'content' => $newContent, 'c_id' => $newC_id, 'ogp_description' => $newOgpDescription]
        ];
        $this->assertSame($expected, $this->dbh->select('*', self::TABLENAME, "id = {$id}"));
    }


    public function providerForFindInfosByC_id(): array
    {
        return [
            'when given existent c_id' => [self::SAMPLE_C_ID],
            'when given non-existent c_id' => [self::FAKE_C_ID]
        ];
    }


    public function providerForFindById(): array
    {
        return [
            'when given existent id and content is needed' => [1, TRUE],
            'when given existent id and content is not needed' => [1, FALSE],
            'when given non-existent id' => [self::FAKE_ID, TRUE]
        ];
    }
}
