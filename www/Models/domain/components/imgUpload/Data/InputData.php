<?php

namespace domain\components\imgUpload\Data;

class InputData
{
    private $attr;

    public function __construct(string $tmpImgFileName, string $ext)
    {
        $this->attr = compact('tmpImgFileName', 'ext');
    }


    public function toArray(): array
    {
        return $this->attr;
    }
}
