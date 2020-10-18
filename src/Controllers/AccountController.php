<?php


namespace App\Controllers;



use App\Controller;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->setTemplate('account');
    }

    final public function render()
    {


        $this->setVars('title', 'Yeah, Call Rudra - /account');

        $this->renderTwig();
    }
}