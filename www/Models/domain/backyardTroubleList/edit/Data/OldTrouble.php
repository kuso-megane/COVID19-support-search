<?php

namespace domain\backyardTroubleList\edit\Data;

class OldTrouble
{
    private $attr;

    public function __construct(int $id, string $name, string $meta_word, int $articleC_id)
    {
        $this->attr = compact('id', 'name', 'meta_word', 'articleC_id');
    }

    public function toArray(): array
    {
        return $this->attr;
    }
}