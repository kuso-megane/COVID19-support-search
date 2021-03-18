<?php

namespace myapp\Controllers;

use myapp\myFrameWork\Bases\BaseController;

class OrganizationController extends BaseController
{

    public function detail(array $vars)
    {
        require '/var/www/html/views/organization/detail.php';
    }
}