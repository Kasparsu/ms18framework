<?php


namespace App;


class Router
{
    private $url;
    private $routes = [];
    /**
     * Router constructor.
     */
    public function __construct($url)
    {
        $url = explode('?', $url)[0];
        $this->url = $url;
        $this->routes = require('../routes.php');
    }

    public function match(){
        $routeNames = array_column($this->routes, 0);
        if(!in_array($this->url, $routeNames)){
            echo "404 - page not found";
            die;
        }
        foreach ($this->routes as $route){
            if($this->url == $route[0]){
                call_user_func($route[1]);
            }
        }
    }
}