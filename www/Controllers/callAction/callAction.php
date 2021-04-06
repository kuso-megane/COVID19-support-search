<?php

// routerからcontrollerへ繋ぐ

use myapp\Controllers\ArticleController;
use myapp\controllers\SearchController;
use myapp\controllers\BackyardArticleController as BYArticleController;
use myapp\Controllers\SubContentsController;

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
        $controller->index();
        
    }
    elseif ($handler == 'searchResult') {

        $controller = new SearchController;
        $controller->result($vars);
        
    }
    elseif ($handler == 'articleList') {

        $controller = new ArticleController;
        $controller->_list();

    }
    elseif ($handler == 'articleShow') {
        $controller = new ArticleController;
        $controller->show($vars);
    }
    elseif ($handler == 'backyardArticleIndex') {

        $controller = new BYArticleController;
        $controller->index($vars);

    }
    elseif ($handler == 'backyardArticleEdit') {

        $controller = new BYArticleController;
        $controller->edit($vars);

    }
    elseif ($handler == 'backyardArticlePost') {

        $controller = new BYArticleController;
        $controller->post($vars);

    }
    elseif($handler == 'subContentsAdminInfo') {
        $controller = new SubContentsController;
        $controller->adminIntro();
    }
    elseif($handler == 'subContentsGuideline') {
        $controller = new SubContentsController;
        $controller->guideline();
    }
    elseif ($handler == 'subContentsContact') {
        $controller = new SubContentsController;
        $controller->contact();
    }
    else {
        http_response_code(404);
        echo "ページが見つかりませんでした\n";
    }
}