<?php

namespace domain\backyardArticleCategory\post\Data;

class InputData
{
    private $attr;

    public function __construct(?int $c_id, string $name)
    {
        $this->attr = compact('c_id', 'name');
    }


    public function toArray(): array
    {
        return $this->attr;
    }
}
