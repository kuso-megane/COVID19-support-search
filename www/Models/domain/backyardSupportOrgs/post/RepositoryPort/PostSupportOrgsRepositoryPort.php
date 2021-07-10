<?php

namespace domain\backyardSupportOrgs\post\RepositoryPort;

interface PostSupportOrgsRepositoryPort
{
    /**
     * @param int|NULL $id
     * @param int $area_id
     * @param string $support_content
     * @param string $owner
     * @param string $access
     * @param int $is_foreign_ok  1 or 0
     * @param int $is_public  1 or 0
     * @param string $appendix
     * 
     * @return bool whether posting succeeded or not
     */
    public function postSupportOrgs(?int $id, int $area_id, string $support_content, string $owner,
        string $access, int $is_foreign_ok, int $is_public, string $appendix): bool;
}
