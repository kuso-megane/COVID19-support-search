<?php

namespace domain\backyardArticle\post\Data;

class InputData
{
    private $attr;

    public function __construct(?int $artcl_id, string $title, ?string $oldThumbnailName, ?array $newThumbnailFileInfo, string $content, int $c_id)
    {
        $this->attr = compact('artcl_id', 'title', 'oldThumbnailName', 'newThumbnailFileInfo', 'content', 'c_id');
    }


    public function toArray(): array
    {
        return $this->attr;
    }
}
