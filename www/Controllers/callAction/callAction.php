<?php

// routerからcontrollerへ繋ぐ

use myapp\Controllers\ArticleController;
use myapp\controllers\SearchController;
use myapp\controllers\OrganizationController;
//use myapp\controllers\BackyardController as Backyard;


/**
 * @param string $handler
 * @param array|NULL $vars  e.g. ['c_id' => 4, 'subc-id' => 7]
 *
 * @return void
 */
function callAction (string $handler, ?array $vars = NULL)
{
    if ($handler == 'index') {

        $controller = new SearchController;
        $controller->index($vars);
        
    }
    elseif ($handler == 'searchResult') {

        $controller = new SearchController;
        $controller->result($vars);
        
    }
    elseif ($handler == 'articleList') {

        $controller = new ArticleController;
        $controller->list();

    }
    elseif ($handler == 'articleShow') {
        $controller = new ArticleController;
        $controller->show($vars);
    }
    /*
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
    */
}