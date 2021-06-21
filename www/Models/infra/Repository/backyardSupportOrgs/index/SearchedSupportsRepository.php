<?php

namespace infra\Repository\backyardSupportOrgs\index;

use domain\backyardSupportOrgs\index\Data\SearchedSupport;
use domain\backyardSupportOrgs\index\RepositoryPort\SearchedSupportsRepositoryPort;
use infra\database\src\SupportOrgsTable;

class SearchedSupportsRepository implements SearchedSupportsRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new SupportOrgsTable();
    }

    /**
     * @inheritDoc
     */
    public function searchSupports(string $owner_word, $maxNum): array
    {
        $records = $this->table->findByOwnerWord($owner_word, $maxNum);

        foreach ($records as &$record) {
            $record = new SearchedSupport(
                $record['id'],
                $record['area_id'],
                $record['owner'],
                $record['support_content'],
                $record['appendix']
            );
        }

        return $records;
    }
}