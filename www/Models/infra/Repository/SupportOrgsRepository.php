<?php

namespace infra\Repository;

use domain\search\result\Data\MetaTrouble;
use domain\search\result\Data\SearchedSupport;
use domain\search\result\RepositoryPort\SearchedSupportsRepositoryPort;
use infra\database\src\SupportOrgsTable;
use myapp\config\AppConfig;

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
    public function searchSupports(int &$total, MetaTrouble $metaTrouble, int $area_id, bool $is_only_foreign_ok, bool $is_public, int $page): array
    {
        $metaWord = $metaTrouble->getMetaWord();
        $datas = $this->table->findSearchedOnes($total, $metaWord, $area_id, $is_only_foreign_ok, $is_public, AppConfig::MAXNUM_PER_PAGE, $page, TRUE);

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
