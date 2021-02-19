<?php

namespace myapp\myFrameWork\DI;

use myapp\myFrameWork\DI\exception\DIFailException;


class Container
{

    /**
     * return instance of given class and execute constructer injection
     * @param string $className
     */
    public function getInstance(string $className)
    {
        try {
            if(1) {
                echo 'a';
            }
            else {
                throw new DIFailException();
            }

        } catch (DIFailException $e) {

            echo $e->getMessage(). "\n";

        }   
    }
}