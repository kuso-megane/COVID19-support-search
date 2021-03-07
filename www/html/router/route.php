<?php

/*
 * dependent on FastRoute https://github.com/nikic/FastRoute
 */

require_once '../../vendor/autoload.php';
require '../../controllers/callAction/callAction.php';


$base = '/';
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) use ($base) {
    $r->addRoute('GET', $base.'index[/{page:\d+}]', 'index'); //index

    $r->addRoute('GET', '/search', 'searchResult');
    
    $r->addRoute('GET', '/orgDetail/{org_id:\d+}', 'orgDetail');

    $r->addRoute('GET', '/article/list', 'articleList');
    $r->addRoute('GET', '/article/{artcl_id:\d+}', 'articleShow');

    $r->addGroup('/backyard', function (FastRoute\RouteCollector $r) {
        $r->addRoute('GET', '[/]', 'backyardIndex');
        $r->addRoute('GET', '/edit[/{artcl_id:\d+}]', 'backyardEdit');
        $r->addRoute('POST', '/create/{c_id:\d+}/{subc_id:\d+}/{title:}/{content:}', 'backyardCreate');
        $r->addRoute('POST', '/post/{artcl_id:\d+}{c_id:\d+}/{subc_id:\d+}/{title:}/{content:}', 'backyardUpdate');
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
        echo "ページが見つかりませんでした\n";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        // ... 405 Method Not Allowed
        //$allowedMethods = $routeInfo[1];
        echo "許可されていないHTTPリクエストです\n";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        callAction($handler, $vars); // reference to callAction.php
        break;
}

