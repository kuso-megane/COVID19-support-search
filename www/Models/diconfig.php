<?php

use domain\components\searchBox\RepositoryPort\TroubleNameListRepositoryPort;
use infra\Repository\TroubleListRepository;

return [
    TroubleNameListRepositoryPort::class => \DI\create(TroubleListRepository::class)
];
