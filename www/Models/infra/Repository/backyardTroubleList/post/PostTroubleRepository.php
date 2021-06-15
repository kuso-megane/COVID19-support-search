<?php

namespace infra\Repository\backyardTroubleList\post;

use domain\backyardTroubleList\post\RepositoryPort\PostTroubleRepositoryPort;
use infra\database\src\TroubleListTable;
use PDOException;

class PostTroubleRepository implements PostTroubleRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new TroubleListTable();
    }


    /**
     * @inheritDoc
     */
    public function postTrouble(?int $id, string $name, int $articleC_id): bool
    {

        try {
            if ($id === NULL) {
                $this->table->create($name, $articleC_id);
            }
            else {
                $this->table->update($id, $name, $articleC_id);
            }
        }
        catch(PDOException $e) {
            return FALSE;
        }

        return TRUE;
            
    }
}