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
    public function postTrouble(?int $id, string $name, string $meta_word, int $articleC_id): bool
    {

        try {
            if ($id === NULL) {
                $this->table->create($name, $meta_word, $articleC_id);
            }
            else {
                $this->table->update($id, $name, $meta_word, $articleC_id);
            }
        }
        catch(PDOException $e) {
            return FALSE;
        }

        return TRUE;
            
    }
}