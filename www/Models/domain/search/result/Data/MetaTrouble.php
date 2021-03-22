<?php

namespace domain\search\result\Data;

class MetaTrouble
{
    private $meta_word;

    public function __construct(string $meta_word)
    {
        $this->meta_word = $meta_word;
    }


    public function getMetaWord(): string
    {
        return $this->meta_word;
    }
}