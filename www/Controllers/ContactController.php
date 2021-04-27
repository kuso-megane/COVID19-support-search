<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;

class ContactController extends BaseController
{
    const DIR = 'contact';

    public function contactPage()
    {
        $this->render([], self::DIR, 'contactPage');
    }


    public function sendMail()
    {
        
    }
}