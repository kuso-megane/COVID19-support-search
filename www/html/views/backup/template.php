<?php

namespace myapp\views\category\index\template;

class Template 
{
    private $category;
    private $subCategory;

    public function __construct(?string $category = NULL, ?string $subCategory = NULL)
    {
        $this->category = $category;
        $this->subCategory = $subCategory;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function getSubCategory(): ?string
    {
        return $this->subCategory;
    }

    public function show()
    {
        require "templateView.php";
    }
}
