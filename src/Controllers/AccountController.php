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
        $this->setVars('title', 'Register');
        $this->setVars('description', 'Yeah, Call Rudra');
        $this->setVars('teaser', array(
            'md'=> 'images/slide/mysql1x.jpg',
            'dt'=> 'images/slide/mysql2x.jpg',
            'lg'=> 'images/slide/mysql3x.jpg',
        ));

        $dotenv = Dotenv::createImmutable('../');
        $dotenv->load();
        $this->setVars('canoncial', $_ENV['ROOT']);


        // Render Twig
        $this->renderTwig();
    }

    final public function renderLogin()
    {
        $this->setVars('title', 'Login');
        $this->setVars('description', 'Yeah, Call Rudra');
        $this->setVars('teaser', array(
            'md'=> 'images/slide/mysql1x.jpg',
            'dt'=> 'images/slide/mysql2x.jpg',
            'lg'=> 'images/slide/mysql3x.jpg',
        ));

        $dotenv = Dotenv::createImmutable('../');
        $dotenv->load();
        $this->setVars('canoncial', $_ENV['ROOT']);


        // Render Twig
        $this->renderTwig();
    }
}