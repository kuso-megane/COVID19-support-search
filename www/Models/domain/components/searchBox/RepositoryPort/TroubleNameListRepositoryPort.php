<?php

namespace domain\components\searchBox\RepositoryPort;

use domain\components\searchBox\Data\TroubleName;

interface TroubleNameListRepositoryPort
{
    /**
     * @return TroubleName[]
     */
    public function getTroubleNameList(): array;
}
