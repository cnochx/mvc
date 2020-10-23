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
     * Get the Parameter
     * @return mixed the in $this->request held Parameter from the url
     */
    public function getRequest() {
        // Get the given Parameter from the url, hold in $this->request
        return $this->request;
    }

    /**
     * Check the rout for a callable closure
     * @return bool Give a true, if the path has a callable closure, or a false, if not.
     */
    public function checkClosure() {
        // check if Route exist, when yes, call the callable closure and put the value of the runner to yes
        $runner = false;
        foreach ($this->routes as $key=>$value) {
            unset($value);
            // Define th runner with tru, when a closure to a path exist
            if($key === $this->getRequest()) {
                $runner = true;
            }
        }
        return $runner;
    }

    /**
     * Execute the in the instanced class specified routes
     */
    public function execute() {
        // When the runner has true, give back the callable closure, when not, give a 404
        if($this->checkClosure() === false) {
            $message = new Mssg();
            $message->error404();
        } else {
            $this->routes[$this->getRequest()]();
        }
        unset($runner);



//

    }
}