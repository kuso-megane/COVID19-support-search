<?php

namespace domain\backyardTroubleList\edit\RepositoryPort;

use domain\backyardTroubleList\edit\Data\OldTrouble;

interface OldTroubleRepositoryPort
{
    /**
     * @param int $trouble_id
     * 
     * @return OldTrouble|NULL
     * 
     * if no trouble is found, return NULL
     */
    public function getOldTrouble(int $trouble_id): ?OldTrouble;
}
