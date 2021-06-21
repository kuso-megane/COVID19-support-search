<?php

namespace domain\backyardSupportOrgs\index\Data;

class InputData
{
    private $attr;

    public function __construct(?string $owner_word)
    {
        $this->attr = compact('owner_word');
    }


    public function toArray(): array
    {
        return $this->attr;
    }
}