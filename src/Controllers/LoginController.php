<?php

namespace App\Controllers;

use App\Models\AccountModel;
use App\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->setTemplate('login');
    }

    final public function render()
    {
//        $model = new AccountModel();
//        $model->login();

        $this->setVars('title', 'Yeah, Call Rudra - /login');

        $this->renderTwig();
    }

}