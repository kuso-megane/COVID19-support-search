<?php

namespace domain\article\show\Data;

class InputData
{
    private $article_id;

    public function __construct(int $article_id)
    {
        $this->article_id = $article_id;
    }


    public function toArray() :array
    {
        return [
            'article_id' => $this->article_id
        ];
    }
}