<?php

namespace domain\backyardSupportOrgs\index\RepositoryPort;

use domain\backyardSupportOrgs\index\Data\SearchedSupport;

interface SearchedSupportsRepositoryPort
{
    /**
     * @param string $owner_word
     * 
     * @return SearchedSupport[]
     * 
     */
    public function searchSupports(string $owner_word): array;
}