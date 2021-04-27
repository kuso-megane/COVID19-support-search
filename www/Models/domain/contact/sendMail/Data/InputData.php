<?php

namespace domain\contact\sendMail\Data;

class InputData
{
    private $attr;

    public function __construct(string $subject, string $from, string $message)
    {
        $this->attr = compact('subject', 'from', 'message');
    }


    public function toArray():array
    {
        return $this->attr;
    }
}
