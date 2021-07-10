<?php

namespace domain\backyardSupportOrgs\edit\RepositoryPort;

use domain\backyardSupportOrgs\edit\Data\Area;

interface AreaListRepositoryPort
{
    /**
     * @return Area[]
     */
    public function getAreaList(): array;
}