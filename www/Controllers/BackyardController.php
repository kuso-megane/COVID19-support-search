<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;

class BackyardController extends BaseController
{
    public function index()
    {
        $this->render([], 'backyard', 'index');
    }
}
