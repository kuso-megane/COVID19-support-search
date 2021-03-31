<?php

namespace domain\article\show\Data;

class ArticleContent
{
    private $title;
    private $thumbnailName;
    private $content;

    public function __construct(string $title, string $thumbnailName, string $content)
    {
        $this->title = $title;
        $this->thumbnailName = $thumbnailName;
        $this->content = $content;
    }


    public function toArray() :array
    {
        return [
            'title' => $this->title,
            'thumbnailName' => $this->thumbnailName,
            'content' => $this->content
        ];
    }
}
