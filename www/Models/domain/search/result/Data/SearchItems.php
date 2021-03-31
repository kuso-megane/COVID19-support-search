<?php

namespace domain\search\result\Data;

class SearchItems
{
    private $meta_word;
    private $articleC_id;

    public function __construct(string $meta_word, int $articleC_id)
    {
        $this->meta_word = $meta_word;
        $this->articleC_id = $articleC_id;
    }


    public function toArray(): array
    {
        return [
            'meta_word' => $this->meta_word,
            'articleC_id' => $this->articleC_id
        ];
    }

}