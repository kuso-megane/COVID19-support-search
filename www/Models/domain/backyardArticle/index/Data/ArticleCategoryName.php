<?php

namespace domain\backyardArticle\index\Data;

class ArticleCategoryName
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
