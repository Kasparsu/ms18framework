<?php

use App\Controllers\BaseController;
use App\DB;
use App\DI;
use App\Router;

require '../vendor/autoload.php';

require_once '../helpers.php';

DI::$DB = new DB();
$router = new AltoRouter();
$router->addRoutes(include '../routes.php');
$match = $router->match();

// call closure or throw 404 status
if( is_array($match) && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    // no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
//$router = new Router($_SERVER['REQUEST_URI']);
//$router->match();
