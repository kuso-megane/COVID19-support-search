<?php

namespace domain\backyardTroubleList\post\Data;

class InputData
{
    private $attr;

    public function __construct(?int $id, string $name, int $articleC_id, string $csrfToken)
    {
        $this->attr = compact('id', 'name', 'articleC_id', 'csrfToken');
    }


    public function toArray(): array
    {
        return $this->attr;
    }
}