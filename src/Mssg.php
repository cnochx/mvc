<?php

namespace App;


class Mssg
{
    public function error404() {
        http_response_code(404);
        //Include custom 404.php message
        include '../templates/404.html';
        //Kill the script.
        exit;
    }
    public function error504() {
        http_response_code(504);
        //Include custom 404.php message
        include '../templates/504.html';
        //Kill the script.
        exit;
    }
}