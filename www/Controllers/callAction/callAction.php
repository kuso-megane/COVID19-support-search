<?php

// routerからcontrollerへ繋ぐ

use myapp\Controllers\AdminLoginController;
use myapp\Controllers\ArticleController;
use myapp\Controllers\SearchController;
use myapp\Controllers\BackyardArticleController as BYArticleController;
use myapp\Controllers\BackyardArticleCategoryController as BYArticleCategoryController;
use myapp\Controllers\BackyardController;
use myapp\Controllers\BackyardSupportOrgsController;
use myapp\Controllers\BackyardTroubleListController;
use myapp\Controllers\ContactController;
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

    elseif($handler == 'subContentsAdminInfo') {
        $controller = new SubContentsController;
        $controller->adminIntro();
    }
    elseif($handler == 'subContentsGuideline') {
        $controller = new SubContentsController;
        $controller->guideline();
    }

    elseif ($handler == 'contactContactPage') {
        $controller = new ContactController;
        $controller->contactPage();
    }
    elseif ($handler == 'contactSendMail') {
        $controller = new ContactController;
        $controller->sendMail();
    }

    elseif($handler == 'backyardIndex') {
        $controller = new BackyardController;
        $controller->index();
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

    elseif($handler == 'backyardArticleCategoryIndex') {

        $controller = new BYArticleCategoryController;
        $controller->index();

    }
    elseif ($handler == 'backyardArticleCategoryEdit') {

        $controller = new BYArticleCategoryController;
        $controller->edit($vars);

    }
    elseif ($handler == 'backyardArticleCategoryPost') {

        $controller = new BYArticleCategoryController;
        $controller->post($vars);
        
    }

    elseif($handler == 'adminLoginLoginPage') {

        $controller = new AdminLoginController;
        $controller->loginPage();

    }
    elseif ($handler == 'adminLoginAuthenticate') {

        $controller = new AdminLoginController;
        $controller->authenticate();
        
    }

    elseif ($handler == 'backyardTroubleListIndex') {
        $controller = new BackyardTroubleListController;
        $controller->index();
    }
    elseif ($handler == 'backyardTroubleListEdit') {
        $controller = new BackyardTroubleListController;
        $controller->edit($vars);
    }
    elseif ($handler == 'backyardTroubleListPost') {
        $controller = new BackyardTroubleListController;
        $controller->post($vars);
    }
    
    elseif ($handler == 'backyardSupportOrgsIndex') {
        $controller = new BackyardSupportOrgsController;
        $controller->index();
    }

    else {
        http_response_code(404);
        echo "ページが見つかりませんでした\n";
    }
}