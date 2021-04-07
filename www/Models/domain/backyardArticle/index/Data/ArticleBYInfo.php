<?php

namespace domain\backyardArticle\index\Data;

class ArticleBYInfo
{
    private $id;
    private $title;
    private $c_id;

    public function __construct(int $id, string $title, int $c_id)
    {
        $this->id = $id;
        $this->title = $title;
        $this->c_id = $c_id;
    }


    public function toArray():array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'c_id' => $this->c_id
        ];
    }
}
