<?php

namespace domain\contact\sendMail\Validator;

use myapp\config\MailConfig;
use myapp\myFrameWork\SuperGlobalVars;

class Validator
{
    public function vaildate():InputData
    {
        $post = SuperGlobalVars::getPost();

        $to = MailConfig::MAIL_ADRESS;
        $from = $post['from'];
        if (strlen($from) > 0 || strlen())
        $subject = $post['subject'];
        
    }
}