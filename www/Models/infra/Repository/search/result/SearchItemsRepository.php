<?php

namespace infra\Repository\search\result;

use domain\search\result\RepositoryPort\SearchItemsRepositoryPort;
use infra\database\src\TroubleListTable;
use domain\search\result\Data\SearchItems;

class SearchItemsRepository implements SearchItemsRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new TroubleListTable;
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