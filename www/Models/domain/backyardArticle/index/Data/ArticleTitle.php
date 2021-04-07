<?php

namespace domain\backyardArticle\index\Data;

class ArticleTitle
{
    private $id;
    private $title;

    public function __construct(int $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
    }


    public function toArray():array
    {
        return [
            'id' => $this->id,
            'title' => $this->title
        ];
    }
}
