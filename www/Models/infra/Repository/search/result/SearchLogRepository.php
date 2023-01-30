<?php

namespace infra\Repository\search\result;

use domain\search\result\RepositoryPort\SearchLogRepositoryPort;
use infra\database\src\SearchLogTable;
use PDOException;

class SearchLogRepository implements SearchLogRepositoryPort
{

    private $table;

    public function __construct()
    {
        $this->table = new SearchLogTable;
    }

    public function updateSearchLog(int $trouble_id, int $area_id, bool $is_only_foreign_ok): bool
    {
        try {
            $this->table->create($trouble_id, $area_id, $is_only_foreign_ok);
        }
        catch(PDOException $e) {
            throw $e;
            return FALSE;
        }

        return TRUE;
    }

}