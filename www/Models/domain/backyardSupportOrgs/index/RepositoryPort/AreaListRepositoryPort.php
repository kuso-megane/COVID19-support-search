<?php

namespace domain\backyardSupportOrgs\index\RepositoryPort;

use domain\backyardSupportOrgs\index\Data\Area;

interface AreaListRepositoryPort
{
    /**
     * @return Area[]
     */
    public function getAreaList(): array;
}