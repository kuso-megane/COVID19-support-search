<?php

namespace infra\Repository;

use domain\components\searchBox\Data\TroubleName;
use domain\components\searchBox\RepositoryPort\TroubleNameListRepositoryPort;
use domain\search\result\Data\SearchItems;
use domain\search\result\RepositoryPort\SearchItemsRepositoryPort;
use infra\database\src\TroubleListTable;

class TroubleListRepository
implements TroubleNameListRepositoryPort,
SearchItemsRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new TroubleListTable();
    }


    /**
     * @inheritDoc
     */
    public function getTroubleNameList(): array
    {
        $troubles = $this->table->findAll(FALSE);

        foreach($troubles as &$trouble) {
            $trouble = new TroubleName($trouble['id'], $trouble['name']);
        }

        return $troubles;
    }


    /**
     * @inheritDoc
     */
    public function getSearchItems(int $trouble_id): ?SearchItems
    {
        $data = $this->table->findById($trouble_id);

        if ($data === NULL) {
            return NULL;
        }
        else {
            return new SearchItems($data['meta_word'], $data['ArticleC_id']);
        }   
    }
}
