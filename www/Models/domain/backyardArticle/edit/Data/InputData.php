<?php

namespace domain\backyardArticle\edit\Data;

class InputData
{
    private $artcl_id;

    public function __construct(?int $artcl_id)
    {
        $this->artcl_id = $artcl_id;
    }


    public function toArray():array
    {
        return [
            'artcl_id' => $this->artcl_id
        ];
    }
}
