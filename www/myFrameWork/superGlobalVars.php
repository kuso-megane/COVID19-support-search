<?php

namespace myapp\myFrameWork;


class SuperGlobalVars
{

    public static function getGet():array
    {
        return $_GET;
    }


    public static function getPost():array
    {
        return $_POST;
    }


    public static function getServer():array
    {

        return $_SERVER;
    }

    public static function getCookie():array
    {
        return $_COOKIE;
    }


    public static function getFiles():array
    {
        return $_FILES;
    }
}