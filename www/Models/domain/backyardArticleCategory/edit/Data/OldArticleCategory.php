<?php

namespace domain\backyardArticleCategory\edit\Data;

class OldArticleCategory
{
    private $attr;

    public function __construct(int $id, string $name)
    {
       $this->attr = compact('id', 'name'); 
    }


    public function toArray(): array
    {
        return $this->attr;
    }
}