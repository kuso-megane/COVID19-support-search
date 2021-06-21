<?php

namespace domain\backyardSupportOrgs\index\RepositoryPort;

use domain\backyardSupportOrgs\index\Data\SearchedSupports;

interface SearchedSupportsRepositoryPort
{
    /**
     * @param string $owner_word
     * 
     * @return SearchedSupports[]
     * 
     */
    public function searchSupports(string $owner_word): array;
}