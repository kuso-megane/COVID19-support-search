<?php

namespace myapp\Controllers;

use myapp\config\MailConfig;
use myapp\myFrameWork\Bases\BaseController;

class ContactController extends BaseController
{
    const DIR = 'contact';

    public function contactPage()
    {
        $adress = MailConfig::MAIL_ADRESS;
        $this->render(compact('adress'), self::DIR, 'contactPage');
    }


    public function sendMail()
    {
        //実装予定
    }
}