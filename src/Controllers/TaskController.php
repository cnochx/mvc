<?php

namespace App\Controllers;

use App\Controller;
use Dotenv\Dotenv;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->setTemplate('task');
    }

    final public function renderA()
    {
        $this->setVars('title', 'Yeah, Call Rudra -Task A');
        $this->setVars('description', 'Yeah, Call Rudra');

        $dotenv = Dotenv::createImmutable('../');
        $dotenv->load();
        $this->setVars('canoncial', $_ENV['ROOT']);


        // Render Twig
        $this->renderTwig();
    }

    final public function renderB()
    {
        $this->setVars('title', 'Yeah, Call Rudra -Task B');
        $this->setVars('description', 'Yeah, Call Rudra');

        $dotenv = Dotenv::createImmutable('../');
        $dotenv->load();
        $this->setVars('canoncial', $_ENV['ROOT']);


        // Render Twig
        $this->renderTwig();
    }

    final public function renderC()
    {
        $this->setVars('title', 'Yeah, Call Rudra -Task C');
        $this->setVars('description', 'Yeah, Call Rudra');

        $dotenv = Dotenv::createImmutable('../');
        $dotenv->load();
        $this->setVars('canoncial', $_ENV['ROOT']);


        // Render Twig
        $this->renderTwig();
    }
}