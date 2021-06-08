<?php

namespace domain\backyardTroubleList\index\RepositoryPort;

use domain\backyardTroubleList\index\Data\Trouble;

interface TroubleListRepositoryPort
{
    /**
     * @return Trouble[]
     */
    public function getTrouble():array;
}
