<?php
require_once __DIR__ . '/../vendor/autoload.php';

// 获取路由（注：可以通过s获取到路由）
$routes = $_REQUEST['s'];
$routeArray = array_filter(explode('/', $routes));
// 重建路由索引
list($controllerName, $function) = array_column($routeArray, null);

$controllerName = ucfirst($controllerName);
require_once '../app/controllers/' . $controllerName . 'Controller.php';
$controllerRoute = '\app\controllers\\' . $controllerName . 'Controller';
$controller = new $controllerRoute();
return call_user_func([$controller, $function]);
