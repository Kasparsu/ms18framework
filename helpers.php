<?php

function view($name, $vars=[]){
    extract($vars);
    include __DIR__ . '/views/' . $name . '.php';
}