<?php

use App\Controllers\BaseController;
use App\Controllers\PostController;
use App\DI;
use App\Post;
use App\User;

return [
    ['GET','/hello', function(){
        echo "hello";
    }],
    ['GET','/', function(){

    }],
    ['GET','/world', [BaseController::class, 'show']],
    ['GET','/page1', [BaseController::class, 'page1']],
    ['GET','/posts', [PostController::class, 'index']],
    ['GET','/posts/show', [PostController::class, 'show']],
    ['GET','/posts/create', [PostController::class, 'create']],
    ['POST','/posts/store', [PostController::class, 'store']],
    ['GET','/posts/edit', [PostController::class, 'edit']],
    ['POST','/posts/modify', [PostController::class, 'modify']],
    ['GET','/posts/delete', [PostController::class, 'delete']],
];