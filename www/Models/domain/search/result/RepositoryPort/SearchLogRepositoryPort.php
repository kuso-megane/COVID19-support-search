<?php

namespace domain\search\result\RepositoryPort;


interface SearchLogRepositoryPort
{
    /**
     * @param int $trouble_id
     * @param int $area_id
     * @param bool $is_only_foreign_ok
     * 
     * @return bool whether updating search log is suceeded or not.
     * 
     */
    public function updateSearchLog(int $trouble_id, int $area_id, bool $is_only_foreign_ok): bool;
}