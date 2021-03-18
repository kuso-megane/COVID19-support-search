<?php

namespace myapp\myFrameWork;


class SuperGlobalVars
{
    private $get;
    private $post;
    private $server;
    private $cookie;


    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
        $this->cookie = $_COOKIE;
    }


    public function getGet():array
    {
        return $this->get;
    }


    public function getPost():array
    {
        return $this->post;
    }


    public function getServer():array
    {

        return $this->server;
    }

    public function getCookie():array
    {
        return $this->cookie;
    }
}