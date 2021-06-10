<?php

namespace domain\backyardTroubleList\edit\Data;

class OldTrouble
{
    private $attr;

    public function __construct(int $id, string $name, int $articleC_id)
    {
        $this->attr = compact('id', 'name', 'articleC_id');
    }

    public function toArray(): array
    {
        return $this->attr;
    }
}