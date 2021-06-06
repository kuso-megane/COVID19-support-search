<?php

namespace domain\backyardArticle\index\Data;

class ArticleBYInfo
{
    private $id;
    private $title;
    private $c_id;
    private $ogp_description;

    public function __construct(int $id, string $title, int $c_id, ?string $ogp_description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->c_id = $c_id;
        $this->ogp_description = $ogp_description;
    }


    public function toArray():array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'c_id' => $this->c_id,
            'ogp_description' => $this->ogp_description
        ];
    }
}
