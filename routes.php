<?php

use App\Controllers\BaseController;
use App\DI;
use App\Post;
use App\User;

return [
    ['/hello', function(){
        echo "hello";
    }],
    ['/', function(){
        Post::all();
        User::all();
    }],
    ['/world', [BaseController::class, 'show']],
    ['/page1', [BaseController::class, 'page1']],
];