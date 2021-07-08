<?php

namespace domain\backyardSupportOrgs\post\Data;

class InputData
{
    private $attr;

    public function __construct(?int $id, int $area_id, string $support_content, string $owner,
    string $access, int $is_foreign_ok, int $is_public, string $appendix)
    {
        $this->attr = compact('id', 'area_id', 'support_content', 'owner', 'access', 'is_foreign_ok',
        'is_public', 'appendix');
    }


    public function toArray():array
    {
        return $this->attr;
    }
}