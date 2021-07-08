<?php

namespace infra\Repository\backyardSupportOrgs\post;

use domain\backyardSupportOrgs\post\RepositoryPort\PostSupportOrgsRepositoryPort;
use infra\database\src\SupportOrgsTable;
use PDOException;

class PostSupportOrgsRepository implements PostSupportOrgsRepositoryPort
{
    private $table;

    public function __construct()
    {
        $this->table = new SupportOrgsTable();
    }


    /**
     * @inheritDoc
     */
    public function postSupportOrgs(
        ?int $id, int $area_id, string $support_content, string $owner, string $access,
        int $is_foreign_ok, int $is_public, string $appendix
    ): bool
    {
        try {

            if ($id !== NULL) {
                $this->table->update($id, $area_id, $support_content, $owner, $access, $is_foreign_ok, $is_public, $appendix);
            }
            else {
                $this->table->create($area_id, $support_content, $owner, $access, $is_foreign_ok, $is_public, $appendix);
            }

            return TRUE;

        }
        catch (PDOException $e) {
            return FALSE;
        }
    }
}
