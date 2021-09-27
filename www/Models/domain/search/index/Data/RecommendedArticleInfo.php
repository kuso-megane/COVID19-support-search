<?php

namespace domain\search\index\Data;

class RecommendedArticleInfo
{
    private $attr;

    public function __construct(int $id, string $title, string $thumbnailName)
    {
        $this->attr = compact('id', 'title', 'thumbnailName');
    }


    public function toArray(): array
    {
        return $this->attr;
    }
}