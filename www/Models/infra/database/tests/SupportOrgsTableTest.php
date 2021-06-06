<?php

use infra\database\src\SupportOrgsTable;
use myapp\config\AppConfig;
use myapp\myFrameWork\DB\Connection;
use myapp\myFrameWork\DB\MyDbh;
use PHPUnit\Framework\TestCase;

class SupportOrgsTableTest extends TestCase
{
    const TABLENAME = 'SupportOrgs';

    const SAMPLE_AREA_ID = 2;
    const SAMPLE_META_WORD = 'meta';

    const SAMPLE_DATAS = [
        ['area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample1', 'owner' => 'sample1', 'access' => 'sample1', 
        'is_foreign_ok' => 0, 'is_public' => 0, 'meta_word' => self::SAMPLE_META_WORD, 'appendix' => 'sample1'],
        ['area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample2', 'owner' => 'sample2', 'access' => 'sample2', 
        'is_foreign_ok' => 0, 'is_public' => 1, 'meta_word' => self::SAMPLE_META_WORD, 'appendix' => 'sample2'],
        ['area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample3', 'owner' => 'sample3', 'access' => 'sample3', 
        'is_foreign_ok' => 1, 'is_public' => 0, 'meta_word' => self::SAMPLE_META_WORD, 'appendix' => 'sample3'],
        ['area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample4', 'owner' => 'sample4', 'access' => 'sample4', 
        'is_foreign_ok' => 1, 'is_public' => 1, 'meta_word' => self::SAMPLE_META_WORD, 'appendix' => 'sample4'],
        ['area_id' => AppConfig::ZENKOKU_ID, 'support_content' => 'sample5', 'owner' => 'sample5', 'access' => 'sample5', 
        'is_foreign_ok' => 0, 'is_public' => 1, 'meta_word' => self::SAMPLE_META_WORD, 'appendix' => 'sample5']
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
    public function testFindSearchedOnes(?bool $is_only_foreign_ok, ?bool $is_public, int $page = 1, bool $is_necessary_zenkoku = FALSE)
    {
        $total = 0;
        
        if ($is_only_foreign_ok === NULL && $is_public === NULL) {

            $maxNumPerPage_mock = count($this::SAMPLE_DATAS);

            $fake_meta_word = 'fake';
            $this->assertSame([], $this->table->findSearchedOnes($total, $fake_meta_word, $this::SAMPLE_AREA_ID, TRUE, TRUE, $maxNumPerPage_mock, $page));

            $fake_area_id = 100;
            $this->assertSame([], $this->table->findSearchedOnes($total, $this::SAMPLE_META_WORD, $fake_area_id, TRUE, TRUE, $maxNumPerPage_mock, $page));
        }
        else {
            if ($is_only_foreign_ok === FALSE && $is_public === FALSE) {

                $maxNumPerPage_mock = 1; //ページ切替の検証のため小さく

                if ($page === 1) {
                    $expected = [
                        ['id' => 1, 'area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample1', 'owner' => 'sample1', 'access' => 'sample1', 'appendix' => 'sample1']
                    ];
                }
                elseif ($page === 2) {
                    $expected = [
                        ['id' => 3, 'area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample3', 'owner' => 'sample3', 'access' => 'sample3', 'appendix' => 'sample3']
                    ];    
                }

                $expectedTotal = 2;
                
            }
            elseif($is_only_foreign_ok === FALSE && $is_public === TRUE) {

                $maxNumPerPage_mock = count($this::SAMPLE_DATAS);
                if ($is_necessary_zenkoku === FALSE) {
                    $expected = [
                        ['id' => 2, 'area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample2', 'owner' => 'sample2', 'access' => 'sample2', 'appendix' => 'sample2'],
                        ['id' => 4, 'area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample4', 'owner' => 'sample4', 'access' => 'sample4', 'appendix' => 'sample4']
                    ];
                    $expectedTotal = 2;
                }
                elseif ($is_necessary_zenkoku === TRUE) {

                    $expected = [
                        ['id' => 2, 'area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample2', 'owner' => 'sample2', 'access' => 'sample2', 'appendix' => 'sample2'],
                        ['id' => 4, 'area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample4', 'owner' => 'sample4', 'access' => 'sample4', 'appendix' => 'sample4'],
                        ['id' => 5, 'area_id' => AppConfig::ZENKOKU_ID,'support_content' => 'sample5', 'owner' => 'sample5', 'access' => 'sample5', 'appendix' => 'sample5']
                    ];
                    $expectedTotal = 3;

                }
                

            }
            elseif($is_only_foreign_ok === TRUE && $is_public === FALSE) {

                $maxNumPerPage_mock = count($this::SAMPLE_DATAS);
                $expected = [
                    ['id' => 3, 'area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample3', 'owner' => 'sample3', 'access' => 'sample3', 'appendix' => 'sample3']
                ];
                $expectedTotal = 1;

            }
            elseif($is_only_foreign_ok === TRUE && $is_public === TRUE) {

                $maxNumPerPage_mock = count($this::SAMPLE_DATAS);
                $expected = [
                    ['id' => 4, 'area_id' => self::SAMPLE_AREA_ID, 'support_content' => 'sample4', 'owner' => 'sample4', 'access' => 'sample4', 'appendix' => 'sample4']
                ];
                $expectedTotal = 1;

            }

            $this->assertSame(
                $expected,
                $this->table->findSearchedOnes(
                    $total, $this::SAMPLE_META_WORD, $this::SAMPLE_AREA_ID, $is_only_foreign_ok, $is_public, $maxNumPerPage_mock, $page, $is_necessary_zenkoku
                )
            );

            $this->assertSame($expectedTotal, $total);

        }

    }


    public function providerForFindSearchedOnes():array
    {
        return [
            'when $is_only_foreign_ok == FALSE && $is_public == FALSE && $page == 1' => [FALSE, FALSE, 1],
            'when $is_only_foreign_ok == FALSE && $is_public == FALSE && $page == 2' => [FALSE, FALSE, 2],
            'when $is_only_foreign_ok == FALSE && $is_public == TRUE && zenkoku not included' => [FALSE, TRUE, 1, FALSE],
            'when $is_only_foreign_ok == FALSE && $is_public == TRUE && zenkoku included' => [FALSE, TRUE, 1, TRUE],
            'when $is_only_foreign_ok == TRUE && $is_public == FALSE' => [TRUE, FALSE],
            'when $is_only_foreign_ok == TRUE && $is_public == TRUE' => [TRUE, TRUE],
            'when no record is found' => [NULL, NULL]
        ];
    }
}
