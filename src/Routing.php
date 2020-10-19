<?php

namespace App;

use App\Controllers\TaskController;
use App\Controllers\AccountController;
use App\Controllers\IndexController;
use App\Controllers\LoginController;

class Routing extends Router
{
    /**
     * Routing constructor.
     * @param $get
     */
    public function __construct($get)
    {
        parent::__construct($get);
        $this->defineRoutes();
    }

    /**
     * Define the Routs and define that connected properties from the instanced Controller as callable closure
     */
    public function defineRoutes()
    {
        // Add a Homepage route with the corresponding closure
        $this->addRoute('index', array(new IndexController(), 'render'));
        // Add a login route with the corresponding closure
        $this->addRoute('login', array(new AccountController(), 'renderLogin'));
        /* Add a account route with the corresponding closure */
        $this->addRoute('account', array(new AccountController(), 'renderRegister'));
        /* Add a  route for task a with the corresponding closure */
        $this->addRoute('aufgabe_a', array(new TaskController(), 'renderA'));
        /* Add a  route for task b.1 with the corresponding closure */
        $this->addRoute('aufgabe_b', array(new TaskController(), 'renderB'));
        /* Add a  route for task b.2 with the corresponding closure */
        $this->addRoute('aufgabe_c', array(new TaskController(), 'renderC'));
    }
}