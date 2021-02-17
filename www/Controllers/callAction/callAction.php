<?php

// routerからcontrollerへ繋ぐ

use myapp\controllers\categoryController as Category;
use myapp\controllers\articleController as Article;
use myapp\controllers\BackyardController as Backyard;


/**
 * @param string $handler
 * @param array|NULL $vars  e.g. ['c_id' => 4, 'subc-id' => 7]
 *
 * @return void
 */
function callAction (string $handler, ?array $vars = NULL)
{
    if ($handler == 'index') {

        $controller = new Category;
        $controller->index($vars);
        
    }
    elseif ($handler == 'categoryList') {

        $controller = new Category;
        $controller->list($vars);

    }
    elseif ($handler == 'article') {

        $controller = new Article;
        $controller->show($vars);
        
    }
    elseif ($handler == 'backyardIndex') {

        $controller = new Backyard;
        $controller->index($vars);

    }
    elseif ($handler == 'backyardEdit') {

        $controller = new Backyard;
        $controller->edit($vars);

    }
    elseif ($handler == 'backyardCreate') {

        $controller = new Backyard;
        $controller->create($vars);

    }
    elseif ($handler == 'backyardUpdate') {
        
        $controller = new Backyard;
        $controller->update($vars);

    }
}