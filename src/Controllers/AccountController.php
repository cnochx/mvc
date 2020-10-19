<?php


namespace App\Controllers;



use App\Controller;
use Dotenv\Dotenv;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->setTemplate('account');
    }

    final public function renderRegister()
    {
        $this->setVars('title', 'Yeah, Call Rudra');
        $this->setVars('description', 'Yeah, Call Rudra');

        $dotenv = Dotenv::createImmutable('../');
        $dotenv->load();
        $this->setVars('canoncial', $_ENV['ROOT']);


        // Render Twig
        $this->renderTwig();
    }

    final public function renderLogin()
    {
        $this->setVars('title', 'Yeah, Call Rudra');
        $this->setVars('description', 'Yeah, Call Rudra');

        $dotenv = Dotenv::createImmutable('../');
        $dotenv->load();
        $this->setVars('canoncial', $_ENV['ROOT']);


        // Render Twig
        $this->renderTwig();
    }
}