<?php

namespace domain\backyardSupportOrgs\edit\Data;

class InputData
{
    private $attr;

    public function __construct(?int $id)
    {
        $this->attr = compact('id');
    }


    public function toArray():array
    {
        return $this->attr;
    }
}