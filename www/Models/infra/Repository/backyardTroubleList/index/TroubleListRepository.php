<?php

namespace infra\Repository\backyardTroubleList\index;

use domain\backyardTroubleList\index\Data\Trouble;
use domain\backyardTroubleList\index\RepositoryPort\TroubleListRepositoryPort;
use infra\database\src\TroubleListTable;

class TroubleListRepository implements TroubleListRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new TroubleListTable();
    }


    /**
     * @inheritDoc
     */
    public function getTrouble(): array
    {
        $records = $this->table->findAll(TRUE);

        foreach ($records as &$record) {
            $id = $record['id'];
            $name = $record['name'];
            $meta_word = $record['meta_word'];
            $articleC_id = $record['ArticleC_id'];

            $record = new Trouble($id, $name, $meta_word, $articleC_id);
        }

        return $records;
    }
}