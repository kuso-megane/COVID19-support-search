<?php

namespace domain\backyardTroubleList\edit\Data;

class InputData
{
    private $attr;

    public function __construct(?int $trouble_id)
    {
        $this->attr = compact('trouble_id');
    }


    public function toArray():array
    {
        return $this->attr;
    }
}