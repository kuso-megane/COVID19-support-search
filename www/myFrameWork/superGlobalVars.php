<?php

namespace myapp\myFrameWork;


class superGlobalVars
{
    private $get;
    private $post;
    private $server;


    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
    }


    public function getGet():array
    {
        return $this->get;
    }


    public function getPost():array
    {
        return $this->post;
    }


    public function getServer():array{

        return $this->server;
    }
}