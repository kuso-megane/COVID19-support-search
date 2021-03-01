<?php

namespace myapp\Controllers;

class OrganizationController
{

    public function detail(array $vars)
    {
        require '/var/www/html/views/organization/detail.php';
    }
}