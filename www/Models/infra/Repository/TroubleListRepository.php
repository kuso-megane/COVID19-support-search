<?php

namespace infra\Repository;

use domain\components\searchBox\Data\TroubleName;
use domain\components\searchBox\RepositoryPort\TroubleNameListRepositoryPort;
use domain\search\result\Data\MetaTrouble;
use domain\search\result\RepositoryPort\MetaTroubleReporitoryPort;
use infra\database\src\TroubleListTable;

class TroubleListRepository
implements TroubleNameListRepositoryPort,
MetaTroubleReporitoryPort
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
    public function getMetaTrouble(int $trouble_id): ?MetaTrouble
    {
        $data = $this->table->findById($trouble_id);

        if ($data === NULL) {
            return NULL;
        }
        else {
            return new MetaTrouble($data['meta_word']);
        }   
    }
}
