<?php

namespace domain\search\result\Data;

class SearchedSupport
{
    private $support_content;
    private $owner;
    private $access;
    private $appendix;

    public function __construct(string $support_content, string $owner, string $access, ?string $appendix)
    {
        $this->support_content = $support_content;
        $this->owner = $owner;
        $this->access = $access;
        $this->appendix = $appendix;
    }


    public function toArray():array
    {
        return [
            'support_content' => $this->support_content,
            'owner' => $this->owner,
            'access' => $this->access,
            'appendix' => $this->appendix
        ];
    }
}
