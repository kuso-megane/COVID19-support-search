<?php

namespace domain\backyardArticleCategory\edit\Data;

class InputData
{
    private $attr;
    
    public function __construct(?int $c_id)
    {
        $this->attr = compact('c_id');
    }


    public function toArray(): array
    {
        return $this->attr;
    }
}