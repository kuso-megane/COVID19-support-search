<?php

namespace domain\article\_list\Data;

class ArticleInfo
{
    private $id;
    private $title;
    private $thumbnailName;
    private $c_id;

    public function __construct(int $id, string $title, string $thumbnailName, int $c_id)
    {
        $this->id = $id;
        $this->title = $title;
        $this->thumbnailName = $thumbnailName;
        $this->c_id = $c_id;
    }


    public function toArray():array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'thumbnailName' => $this->thumbnailName,
            'c_id' => $this->c_id
        ];
    }
}
