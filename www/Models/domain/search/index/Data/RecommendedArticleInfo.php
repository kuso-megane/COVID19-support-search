<?php

namespace domain\search\index\Data;

class RecommendedArticleInfo
{
    private $attr;

    public function __construct(int $id, string $thumbnailName, string $title)
    {
        $this->attr = compact($id, $thumbnailName, $title);
    }


    public function toArray(): array
    {
        return $this->attr;
    }
}