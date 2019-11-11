<?php

use App\Controllers\BaseController;
use App\Controllers\PostController;
use App\DI;
use App\Post;
use App\User;

return [
    ['/hello', function(){
        echo "hello";
    }],
    ['/', function(){

    }],
    ['/world', [BaseController::class, 'show']],
    ['/page1', [BaseController::class, 'page1']],
    ['/posts', [PostController::class, 'index']],
    ['/posts/show', [PostController::class, 'show']],
    ['/posts/create', [PostController::class, 'create']],
    ['/posts/store', [PostController::class, 'store']],
    ['/posts/edit', [PostController::class, 'edit']],
    ['/posts/modify', [PostController::class, 'modify']],
    ['/posts/delete', [PostController::class, 'delete']],
];