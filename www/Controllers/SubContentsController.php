<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;

class SubContentsController extends BaseController
{
    public function guideline()
    {
        $this->render([], 'subContents', 'guideline');
    }


    public function adminIntro()
    {
        $this->render([], 'subContents', 'adminIntro');
    }


    public function contact()
    {
        $this->render([], 'subContents', 'contact');
    }
}
