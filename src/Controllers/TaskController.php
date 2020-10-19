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
        $this->setVars('title', 'Aufgabe 1');
        $this->setVars('description', 'Yeah, Call Rudra');
        $this->setVars('teaser', array(
            'md'=> 'images/slide/php1x.jpg',
            'dt'=> 'images/slide/php2x.jpg',
            'lg'=> 'images/slide/php3x.jpg',
        ));

        $dotenv = Dotenv::createImmutable('../');
        $dotenv->load();
        $this->setVars('canoncial', $_ENV['ROOT']);


        // Render Twig
        $this->renderTwig();
    }

    final public function renderB()
    {
        $this->setVars('title', 'Aufgabe 2 Teil A');
        $this->setVars('description', 'Yeah, Call Rudra');
        $this->setVars('teaser', array(
            'md'=> 'images/slide/nodejs1x.jpg',
            'dt'=> 'images/slide/nodejs2x.jpg',
            'lg'=> 'images/slide/nodejs3x.jpg',
        ));

        $dotenv = Dotenv::createImmutable('../');
        $dotenv->load();
        $this->setVars('canoncial', $_ENV['ROOT']);


        // Render Twig
        $this->renderTwig();
    }

    final public function renderC()
    {
        $this->setVars('title', 'Aufgabe 2 Teil B');
        $this->setVars('description', 'Yeah, Call Rudra');

        $this->setVars('teaser', array(
            'md'=> 'images/slide/html1x.jpg',
            'dt'=> 'images/slide/html2x.jpg',
            'lg'=> 'images/slide/html3x.jpg',
        ));

        $dotenv = Dotenv::createImmutable('../');
        $dotenv->load();
        $this->setVars('canoncial', $_ENV['ROOT']);


        // Render Twig
        $this->renderTwig();
    }
}