<?php


namespace App\Controllers;


class BaseController
{
    public function show(){
        view('home');
    }
    public function page1(){
        view('page1');
    }
}