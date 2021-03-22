<?php

namespace domain\search\result\RepositoryPort;

use domain\search\result\Data\MetaTrouble;

interface MetaTroubleReporitoryPort
{
    /**
     * @param int $trouble_id
     * 
     * @return MetaTrouble
     */
    public function getMetaTrouble(int $trouble_id):MetaTrouble;
}
