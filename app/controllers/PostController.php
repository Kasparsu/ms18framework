<?php


namespace App\Controllers;


use App\Post;

class PostController
{

    public function index(){
        $posts = Post::all();
        view('posts/index', compact('posts'));
    }

    public function show(){
        $id = $_GET['id'];
        $post = Post::find($id);
        view('posts/show', compact('post'));
    }
    public function create(){
        view('posts/create');
    }
    public function store(){
        $post = new Post();
        $post->title = $_POST['title'];
        $post->body = $_POST['body'];
        $post->insert();
        header('Location: /posts');
        die();
    }
    public function edit(){
        $id = $_GET['id'];
        $post = Post::find($id);
        view('posts/edit', compact('post'));
    }

    public function modify(){
        $id = $_GET['id'];
        $post = Post::find($id);
        $post->title = $_POST['title'];
        $post->body = $_POST['body'];
        $post->update();
        header('Location: /posts');
        die();
    }
    public function delete(){
        $id = $_GET['id'];
        $post = Post::find($id);
        $post->delete();
        header('Location: /posts');
        die();
    }
}