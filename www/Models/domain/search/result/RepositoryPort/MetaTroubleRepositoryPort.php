<?php

namespace domain\search\result\RepositoryPort;

use domain\search\result\Data\MetaTrouble;

interface MetaTroubleRepositoryPort
{
    /**
     * @param int $trouble_id
     * 
     * @return MetaTrouble|NULL
     */
    public function getMetaTrouble(int $trouble_id):?MetaTrouble;
}
