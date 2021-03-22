<?php

use domain\components\searchBox\RepositoryPort\TroubleNameListRepositoryPort;
use domain\search\result\RepositoryPort\MetaTroubleReporitoryPort;
use domain\search\result\RepositoryPort\SearchedSupportsRepositoryPort;
use infra\Repository\SupportOrgsRepository;
use infra\Repository\TroubleListRepository;

return [
    TroubleNameListRepositoryPort::class => \DI\create(TroubleListRepository::class),
    MetaTroubleReporitoryPort::class => \DI\create(TroubleListRepository::class),

    SearchedSupportsRepositoryPort::class => \DI\create(SupportOrgsRepository::class)
];
