<?php

namespace infra\Repository\backyardTroubleList\edit;

use domain\backyardTroubleList\edit\Data\OldTrouble;
use domain\backyardTroubleList\edit\RepositoryPort\OldTroubleRepositoryPort;
use infra\database\src\TroubleListTable;

class OldTroubleRepository implements OldTroubleRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new TroubleListTable;
    }


    /**
     * @inheritDoc
     */
    public function getOldTrouble(int $trouble_id): ?OldTrouble
    {   
        $record = $this->table->findById($trouble_id);

        if ($record === NULL) {
            return NULL;
        }

        return new OldTrouble(
            $record['id'],
            $record['name'],
            $record['meta_word'],
            $record['ArticleC_id']
        );
    }
}