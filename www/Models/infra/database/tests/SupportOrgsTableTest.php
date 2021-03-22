<?php

use infra\database\src\SupportOrgsTable;
use myapp\myFrameWork\DB\Connection;
use myapp\myFrameWork\DB\MyDbh;
use PHPUnit\Framework\TestCase;

class SupportOrgsTableTest extends TestCase
{
    const TABLENAME = 'SupportOrgs';

    const SAMPLE_AREA_ID = 1;
    const SAMPLE_META_WORD = 'meta';

    const SAMPLE_DATAS = [
        ['area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample1', 'owner' => 'sample1', 'access' => 'sample1', 
        'is_foreign_ok' => 0, 'is_public' => 0, 'meta_word' => self::SAMPLE_META_WORD, 'appendix' => 'sample1'],
        ['area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample2', 'owner' => 'sample2', 'access' => 'sample2', 
        'is_foreign_ok' => 0, 'is_public' => 1, 'meta_word' => self::SAMPLE_META_WORD, 'appendix' => 'sample2'],
        ['area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample3', 'owner' => 'sample3', 'access' => 'sample3', 
        'is_foreign_ok' => 1, 'is_public' => 0, 'meta_word' => self::SAMPLE_META_WORD, 'appendix' => 'sample3'],
        ['area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample4', 'owner' => 'sample4', 'access' => 'sample4', 
        'is_foreign_ok' => 1, 'is_public' => 1, 'meta_word' => self::SAMPLE_META_WORD, 'appendix' => 'sample4']
    ];

    private $dbh;
    private $table;

    protected function setup():void
    {
        $this->dbh = (new Connection(TRUE))->connect();
        $this->table = new SupportOrgsTable(TRUE);

        $this->dbh->truncate($this::TABLENAME);

        $sth = $this->dbh->insert($this::TABLENAME,
        '0, :area_id, :support_content, :owner, :access, :is_foreign_ok, :is_public, :meta_word, :appendix',
        [], MyDbh::ONLY_PREPARE);

        foreach($this::SAMPLE_DATAS as $sampleData) {
            $sth->execute([
                ':area_id' => $sampleData['area_id'],
                ':support_content' => $sampleData['support_content'],
                ':owner' => $sampleData['owner'],
                ':access' => $sampleData['access'],
                ':is_foreign_ok' => $sampleData['is_foreign_ok'],
                ':is_public' => $sampleData['is_public'],
                ':meta_word' => $sampleData['meta_word'],
                ':appendix' => $sampleData['appendix']
            ]);
        }

    }


    /**
     * @dataProvider providerForFindSearchedOnes()
     */
    public function testFindSearchedOnes(?bool $is_only_foreign_ok, ?bool $is_public)
    {

        if ($is_only_foreign_ok === NULL && $is_public === NULL) {
            $fake_meta_word = 'fake';
            $this->assertSame([], $this->table->findSearchedOnes($fake_meta_word, $this::SAMPLE_AREA_ID, TRUE, TRUE));

            $fake_area_id = 100;
            $this->assertSame([], $this->table->findSearchedOnes($this::SAMPLE_META_WORD, $fake_area_id, TRUE, TRUE));
        }
        else {
            if ($is_only_foreign_ok === FALSE && $is_public === FALSE) {
                $expected = [
                    ['id' => 1, 'support_content' => 'sample1', 'owner' => 'sample1', 'access' => 'sample1', 'appendix' => 'sample1'],
                    ['id' => 3, 'support_content' => 'sample3', 'owner' => 'sample3', 'access' => 'sample3', 'appendix' => 'sample3']
                ];
            }
            elseif($is_only_foreign_ok === FALSE && $is_public === TRUE) {
                $expected = [
                    ['id' => 2, 'support_content' => 'sample2', 'owner' => 'sample2', 'access' => 'sample2', 'appendix' => 'sample2'],
                    ['id' => 4, 'support_content' => 'sample4', 'owner' => 'sample4', 'access' => 'sample4', 'appendix' => 'sample4']
                ];
            }
            elseif($is_only_foreign_ok === TRUE && $is_public === FALSE) {
                $expected = [
                    ['id' => 3, 'support_content' => 'sample3', 'owner' => 'sample3', 'access' => 'sample3', 'appendix' => 'sample3']
                ];
            }
            elseif($is_only_foreign_ok === TRUE && $is_public === TRUE) {
                $expected = [
                    ['id' => 4, 'support_content' => 'sample4', 'owner' => 'sample4', 'access' => 'sample4', 'appendix' => 'sample4']
                ];
            }

            $this->assertSame(
                $expected,
                $this->table->findSearchedOnes(
                    $this::SAMPLE_META_WORD, $this::SAMPLE_AREA_ID, $is_only_foreign_ok, $is_public
                )
            );

        }

    }


    public function providerForFindSearchedOnes():array
    {
        return [
            'when $is_only_foreign_ok == FALSE && $is_public == FALSE' => [FALSE, FALSE],
            'when $is_only_foreign_ok == FALSE && $is_public == TRUE' => [FALSE, TRUE],
            'when $is_only_foreign_ok == TRUE && $is_public == FALSE' => [TRUE, FALSE],
            'when $is_only_foreign_ok == TRUE && $is_public == TRUE' => [TRUE, TRUE],
            'when no record is found' => [NULL, NULL]
        ];
    }
}
