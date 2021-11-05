<?php

namespace domain\search\index\Data;

class InputData
{
    private $attr;

    public function __construct(string $lang)
    {
        $this->attr = compact('lang');
    }


    public function toArray(): array
    {
        return $this->attr;
    }
}