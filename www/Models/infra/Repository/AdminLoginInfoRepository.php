<?php

namespace infra\Repository;

use domain\adminLogin\authenticate\Data\AdminLoginInfo;
use domain\adminLogin\authenticate\RepositoryPort\AdminLoginInfoRepositoryPort;
use infra\database\src\AdminLoginInfoTable;

class AdminLoginInfoRepository
implements
    AdminLoginInfoRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new AdminLoginInfoTable();
    }


    /**
     * @inheritDoc
     */
    public function getAdminLoginInfo(): AdminLoginInfo
    {
        $record = $this->table->find();

        return new AdminLoginInfo(
            $record['adminID'], $record['pass'], $record['failCount'], $record['lockedTime']
        );
    }


    /**
     * @inheritDoc
     */
    public function updateFailCountAndLockedTime(?int $newFailCount, ?string $newLockedTime): void
    {
        $this->table->update(NULL, NULL, $newFailCount, $newLockedTime);
    }
}
