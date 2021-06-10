<?php

namespace domain\backyardTroubleList\edit\RepositoryPort;

interface OldTroublesRepositoryPort
{
    /**
     * @param int $trouble_id
     * 
     * @return OldTrouble[]|NULL
     */
    public function getOldTroubles(int $trouble_id): ?array;
}
