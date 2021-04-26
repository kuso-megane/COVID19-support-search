<?php

namespace domain\backyardArticleCategory\post\Data;

class InputData
{
    private $attr;

    public function __construct(?int $c_id, string $name, string $csrfToken)
    {
        $this->attr = compact('c_id', 'name', 'csrfToken');
    }


    public function toArray(): array
    {
        return $this->attr;
    }
}
