<?php

use App\Controllers\BaseController;
use App\DB;
use App\DI;
use App\Router;
require_once '../helpers.php';
spl_autoload_register(function ($class){
    $parts = explode('\\', $class);
    foreach ($parts as $key=>$part){
        if($key != count($parts)-1){
            $parts[$key] = strtolower($part);
        }
    }
    $path = '../' . implode('/', $parts) . '.php';
    require_once($path);
});
DI::$DB = new DB();
$router = new Router($_SERVER['REQUEST_URI']);
$router->match();
