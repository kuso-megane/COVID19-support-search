<?php

namespace infra\Repository\backyardSupportOrgs\edit;

use domain\backyardSupportOrgs\edit\Data\OldSupportOrg;
use domain\backyardSupportOrgs\edit\RepositoryPort\OldSupportOrgRepositoryPort;
use infra\database\src\SupportOrgsTable;

class OldSupportOrgRepository implements OldSupportOrgRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new SupportOrgsTable();
    }


    /**
     * @inheritDoc
     */
    public function getOldSupportOrg(int $id): ?OldSupportOrg
    {
        $record = $this->table->findById($id);

        if ($record !== NULL) {
            return new OldSupportOrg(
                $record['id'],
                $record['area_id'],
                $record['support_content'],
                $record['owner'],
                $record['access'],
                $record['is_foreign_ok'],
                $record['is_public'],
                $record['appendix']
            );
        }
        else {
            return NULL;
        }
    }
}