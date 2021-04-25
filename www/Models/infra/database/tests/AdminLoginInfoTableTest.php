<?php

use infra\database\src\AdminLoginInfoTable;
use myapp\myFrameWork\DB\Connection;
use PHPUnit\Framework\TestCase;

class AdminLoginInfoTableTest extends TestCase
{
    const TABLENAME = 'AdminLoginInfo';

    const SAMPLE_LOCKEDTIME = '00:00:00';
    const SAMPLE_FAILCOUNT = 0;

    const SAMPLE_DATA = [
        'adminID' => 'test_id',
        'pass' => 'test_pass',
        'failCount' => self::SAMPLE_FAILCOUNT,
        'lockedTime' => self::SAMPLE_LOCKEDTIME
    ];

    private $table;
    private $dbh;

    protected function setup():void
    {
        $this->dbh = (new Connection(TRUE))->connect();
        $this->table = (new AdminLoginInfoTable(TRUE));

        $this->dbh->truncate(self::TABLENAME);

        $boundColumns = [
            ':adminID' => self::SAMPLE_DATA['adminID'],
            ':pass' => self::SAMPLE_DATA['pass'],
            ':failCount' => self::SAMPLE_FAILCOUNT,
            ':lockedTime' => self::SAMPLE_LOCKEDTIME
        ];
        $this->dbh->insert(self::TABLENAME, '0, :adminID, :pass, :failCount, :lockedTime', $boundColumns);
    }


    public function testFind()
    {
        $expected = self::SAMPLE_DATA;

        $this->assertSame($expected, $this->table->find());
    }


    /**
     * @dataProvider providerForUpdate()
     */
    public function testUpdate(?string $newID, ?string $newPass, ?int $newFailCount, ?string $newLockedTime)
    {
        
        $this->table->update($newID, $newPass, $newFailCount, $newLockedTime);

        $expected = self::SAMPLE_DATA;

        if ($newID != NULL) {
            $expected['adminID'] = $newID;
        }
        
        if ($newPass != NULL) {
            $expected['pass'] = $newPass;
        }

        if ($newFailCount != NULL) {
            $expected['failCount'] = $newFailCount;
        }

        if ($newLockedTime != NULL) {
            $expected['lockedTime'] = $newLockedTime;
        }

        $this->assertSame($expected,
            $this->dbh->select('adminID, pass, failCount, lockedTime', self::TABLENAME)[0]
        );
    }


    public function providerForUpdate():array
    {
        $newID = 'newID';
        $newPass = 'newPass';
        $newFailCount = self::SAMPLE_FAILCOUNT + 1;
        $newLockedTime = '11:11:11';

        return [
            'when only failCount and lockedTime are expected to be updated' => [NULL, NULL, $newFailCount, $newLockedTime],
            'when all are expected to be updated' => [$newID, $newPass, $newFailCount, $newLockedTime]
        ];
    }
}
