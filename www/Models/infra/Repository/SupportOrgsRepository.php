<?php

namespace infra\Repository;

use domain\search\result\Data\MetaTrouble;
use domain\search\result\Data\SearchedSupport;
use domain\search\result\RepositoryPort\SearchedSupportsRepositoryPort;
use infra\database\src\SupportOrgsTable;

class SupportOrgsRepository
implements
    SearchedSupportsRepositoryPort

{
    private $table;

    public function __construct()
    {
        $this->table = new SupportOrgsTable();
    }


    /**
     * @inheritDoc
     */
    public function searchSupports(int &$total, MetaTrouble $metaTrouble, int $region_id, int $area_id, bool $is_foreign_ok, bool $is_public, int $page): array
    {
        $metaWord = $metaTrouble->getMetaWord();
        $datas = $this->table->findSearchedOnes($metaWord, $area_id, $is_foreign_ok, $is_public);

        $total = count($datas);
        
        foreach ($datas as &$data) {
            $data = new SearchedSupport(
                $data['support_content'],
                $data['owner'],
                $data['access'],
                $datas['appendix']
            );
        }

        return $datas;
    }
}
