<?php

namespace domain\search\result\Data;

class RecommendedArticleInfo
{
    private $id;
    private $title;
    private $thumbnailName;

    public function __construct(int $id, string $title, string $thumbnailName)
    {
        $this->id = $id;
        $this->title = $title;
        $this->thumbnailName = $thumbnailName;
    }


    public function toArray():array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'thumbnailName' => $this->thumbnailName
        ];
    }
}