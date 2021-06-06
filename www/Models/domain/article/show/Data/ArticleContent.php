<?php

namespace domain\article\show\Data;

class ArticleContent
{
    private $title;
    private $thumbnailName;
    private $content;
    private $ogp_description;

    public function __construct(string $title, string $thumbnailName, string $content, string $ogp_description)
    {
        $this->title = $title;
        $this->thumbnailName = $thumbnailName;
        $this->content = $content;
        $this->ogp_description = $ogp_description;
    }


    public function toArray() :array
    {
        return [
            'title' => $this->title,
            'thumbnailName' => $this->thumbnailName,
            'content' => $this->content,
            'ogp_description' => $this->ogp_description
        ];
    }
}
