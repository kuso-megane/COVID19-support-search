<?php

namespace domain\search\result\Data;

class SearchedSupport
{
    private $area_id;
    private $support_content;
    private $owner;
    private $access;
    private $appendix;

    public function __construct(int $area_id, string $support_content, string $owner, string $access, ?string $appendix)
    {
        $this->area_id = $area_id;
        $this->support_content = $support_content;
        $this->owner = $owner;
        $this->access = $access;
        $this->appendix = $appendix;
    }


    public function toArray():array
    {
        return [
            'area_id' => $this->area_id,
            'support_content' => $this->support_content,
            'owner' => $this->owner,
            'access' => $this->access,
            'appendix' => $this->appendix
        ];
    }
}
