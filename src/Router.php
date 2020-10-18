<?php

namespace App;

class Router
{
    // Hold the Req-Parameter from the url as an array
    private $request;
    // Hold the Res-Parameter from the url as an array
    private $respond;
    // Hold the Res-Parameter from the url as an array
    private $next;
    // Hold the Routes and the callable functions as an array
    private $routes = array();

    /**
     * Router constructor.
     * @param $get (Array). The already converted array from the url-Parameter
     * @noinspection UnusedConstructorDependenciesInspection
     */
    public function __construct($get){
        foreach ($get as $key => $value){
            switch ($key){
                case 'req':
                    $this->request = $value;
                    break;
                case 'res':
                    $this->respond = $value;
                    break;
                case 'next':
                    $this->next = $value;
                    break;
                default:
                    unset($get[$key]);
            }
        }
    }

    /**
     * Adds the Routes to an array to call the websites
     * @param $route (String): The url (req) Parameter
     * @param callable $closure: (Instanced Class) The called property of the instanced class
     */
    public function addRoute($route, callable $closure) {
        $this->routes[$route] = $closure;
    }

    /**
     * Execute the in the instanced class specified routes
     */
    public function execute() {
        // Get the given Parameter from the url, hold in $this->request
        $path = DIRECTORY_SEPARATOR.$this->request;
        // if Route not exist, give a error404
        if($this->routes[$path] !== null) {
            $this->routes[$path]();
        } else {
            $message = new Mssg();
            $message->error404();
        }
    }
}