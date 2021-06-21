<?php

namespace domain\backyardSupportOrgs\index\RepositoryPort;

use domain\backyardSupportOrgs\index\Data\SearchedSupport;

interface SearchedSupportsRepositoryPort
{
    /**
     * @param string $owner_word
     * @param int $maxNum  of supports per page
     * 
     * @return SearchedSupport[]
     * 
     */
    public function searchSupports(string $owner_word, int $maxNum): array;
}