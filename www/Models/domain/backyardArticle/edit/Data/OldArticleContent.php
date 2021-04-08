<?php

namespace domain\backyardArticle\edit\Data;

class OldArticleContent
{
    private $attr;

    public function __construct(int $id, string $title, string $thumbnailName, string $content, int $c_id)
    {
        $this->attr = compact(['id', 'title', 'thumbnailName', 'content', 'c_id']);
    }


    public function toArray():array
    {
        return $this->attr;
    }
}
