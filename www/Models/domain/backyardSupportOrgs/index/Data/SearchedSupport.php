<?php

namespace domain\backyardSupportOrgs\index\Data;

class SearchedSupport
{
    private $attr;

    public function __construct(int $id, int $area_id, string $owner, string $support_content, string $appendix)
    {
        $this->attr = compact('id', 'area_id', 'owner', 'suppport_content', 'appendix');
    }


    public function toArray(): array
    {
        return $this->attr;
    }
}