<?php

namespace domain\components\searchBox\RepositoryPort;

use domain\components\searchBox\Data\Area;

interface AreaListRepositoryPort
{
    /**
     * @return Area[]
     */
    public function getAreaList(): array;
}