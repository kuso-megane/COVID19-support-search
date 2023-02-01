<?php

use infra\database\src\SearchLogTable;
use myapp\myFrameWork\DB\Connection;
use myapp\myFrameWork\DB\MyDbh;
use PHPUnit\Framework\TestCase;

class SearchLogTableTest extends TestCase
{

    const TABLENAME = 'SearchLog';
    const PARENTTABLE1 = 'AreaList';
    const PARENTTABLE2 = 'TroubleList';
    const GRANDPARENTTABLE = 'Article';
    const GREAT_GRANDPARENT_TABLE = 'ArticleCategory';

    const SAMPLE_AREA_ID = 2;
    const SAMPLE_TROUBLE_ID = 3;
    const SAMPLE_ARTICLE_ID = 1;
    const SAMPLE_CATEGORY_ID = 1;

    const SAMPLE_DATA_PARENT1 = [
        ':id' => self::SAMPLE_AREA_ID, ':name' => 'test'
    ];

    const SAMPLE_DATA_PARENT2 = [
        ':id' => self::SAMPLE_TROUBLE_ID, ':name' => 'sample', ':meta_word' => 'sampleMeta', ':ArticleC_id' => self::SAMPLE_ARTICLE_ID
    ];

    const SAMPLE_DATA_GRANDPARENT = [
        ':id' => self::SAMPLE_ARTICLE_ID, ':title' => 'sample', ':thumbnailName' => 'sample', ':content' => 'sample',
        ':c_id' => self::SAMPLE_CATEGORY_ID, ':ogp_description' => 'sample'
    ];

    const SAMPLE_DATA_GREAT_GRANTPARENT = [
        ':id' => self::SAMPLE_CATEGORY_ID, ':name' => 'sample'
    ];


    protected function setup(): void
    {
        $this->dbh = (new Connection(TRUE))->connect();
        $this->table = new SearchLogTable(TRUE);

        $this->dbh->truncate($this::TABLENAME);
        $this->dbh->truncate(self::PARENTTABLE1);
        $this->dbh->truncate(self::PARENTTABLE2);
        $this->dbh->truncate(self::GRANDPARENTTABLE);
        $this->dbh->truncate(self::GREAT_GRANDPARENT_TABLE);

        $this->dbh->insert(self::GREAT_GRANDPARENT_TABLE, ':id, :name', self::SAMPLE_DATA_GREAT_GRANTPARENT);
        $this->dbh->insert(self::GRANDPARENTTABLE, ':id, :title, :thumbnailName, :content, :c_id, :ogp_description', self::SAMPLE_DATA_GRANDPARENT);
        $this->dbh->insert(self::PARENTTABLE1, ':id, :name', self::SAMPLE_DATA_PARENT1);
        $this->dbh->insert(self::PARENTTABLE2, ':id, :name, :meta_word, :ArticleC_id', self::SAMPLE_DATA_PARENT2);

    }


    public function testCreate()
    {
        $newId = 1;
        $newArea_id = self::SAMPLE_AREA_ID;
        $newTrouble_id = self::SAMPLE_TROUBLE_ID;
        $newIs_only_foreign_ok = 1;

        $this->table->create($newArea_id, $newTrouble_id, $newIs_only_foreign_ok);
        
        $expected = [
            'id' => $newId, 'area_id' => $newArea_id, 'trouble_id' => $newTrouble_id, 'is_only_foreign_ok' => $newIs_only_foreign_ok
        ];
        $this->assertSame($expected, $this->dbh->select('*', self::TABLENAME, "id = {$newId}")[0]);
    }
}