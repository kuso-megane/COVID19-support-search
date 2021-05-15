<?php

/*
 * dependent on FastRoute https://github.com/nikic/FastRoute
 */

require_once '../vendor/autoload.php';
require '../Controllers/callAction/callAction.php';


$base = '/';
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) use ($base) {
    $r->addRoute('GET', $base.'[index[/]]', 'index'); //index

    $r->addRoute('GET', $base.'searchResult/{is_public_page:[0-1]}/{pub_p:\d+}/{pri_p:\d+}', 'searchResult');
    
    $r->addRoute('GET', $base.'article/list', 'articleList');
    $r->addRoute('GET', $base.'article/{artcl_id:\d+}', 'articleShow');

    $r->addGroup($base.'subContents', function (FastRoute\RouteCollector $r) {
        $r->addRoute('GET', '/guideline', 'subContentsGuideline');
        $r->addRoute('GET', '/adminInfo', 'subContentsAdminInfo');
    });

    $r->addGroup($base. 'contact', function(FastRoute\RouteCollector $r) {
        $r->addRoute('GET', '/contactPage', 'contactContactPage');
        $r->addRoute('POST', '/sendMail', 'contactSendMail');
    });

    $r->addGroup($base.'backyard', function (FastRoute\RouteCollector $r) {
        $r->addRoute('GET', '/index[/]', 'backyardIndex');

        $r->addGroup('/article', function (FastRoute\RouteCollector $r) {
            $r->addRoute('GET', '/index[/]', 'backyardArticleIndex');
            $r->addRoute('GET', '/edit[/[{artcl_id:\d+}]]', 'backyardArticleEdit');
            $r->addRoute('POST', '/post[/[{artcl_id:\d+}]]', 'backyardArticlePost');
        });

        $r->addGroup('/articleCategory', function (FastRoute\RouteCollector $r) {
            $r->addRoute('GET', '/index[/]', 'backyardArticleCategoryIndex');
            $r->addRoute('GET', '/edit[/[{c_id:\d+}]]', 'backyardArticleCategoryEdit');
            $r->addRoute('POST', '/post[/[{c_id:\d+}]]', 'backyardArticleCategoryPost');
        });

    });

    $r->addGroup('/adminLogin', function(FastRoute\RouteCollector $r) {
        $r->addRoute('GET', '/loginPage', 'adminLoginLoginPage');
        $r->addRoute('POST', '/authenticate', 'adminLoginAuthenticate');
    });
});


$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        http_response_code(404);
        echo "ページが見つかりませんでした\n";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        // ... 405 Method Not Allowed
        //$allowedMethods = $routeInfo[1];
        http_response_code(405);
        echo "許可されていないHTTPリクエストです\n";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        callAction($handler, $vars); // reference to callAction.php
        break;
}

