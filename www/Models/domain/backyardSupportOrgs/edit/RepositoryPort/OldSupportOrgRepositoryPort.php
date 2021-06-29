<?php

namespace domain\backyardSupportOrgs\edit\RepositoryPort;

use domain\backyardSupportOrgs\edit\Data\OldSupportOrg;

interface OldSupportOrgRepositoryPort
{
    /**
     * @param int $id
     * 
     * @return OldSupportOrg|NULL
     * 
     * if no record is found, return NULL
     */
    public function getOldSupportOrg(int $id): ?OldSupportOrg;

}