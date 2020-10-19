<?php

namespace App\Controllers;

use Dotenv\Dotenv;
use App\Controller;
use App\Models\IndexModel;


class IndexController extends Controller
{
    /**
     * IndexController constructor,
     * set $get and the name of the template
     */
    public function __construct()
    {
        $this->setTemplate('index');
    }

    /**
     * Executive function to render the Twig template with Parameter
     *  @Results: echo the rendered template
     */
    final public function render()
    {
        // Integrate IndexModel
        $model = new IndexModel();
        // Integrate the queries
        $model->newPrep();
        // transfer the Parameter
        $this->setVars('query', $model->newPrep());

        $this->setVars('title', 'Yeah, Call Rudra');
        $this->setVars('description', 'Yeah, Call Rudra');

        $dotenv = Dotenv::createImmutable('../');
        $dotenv->load();
        $this->setVars('canoncial', $_ENV['ROOT']);


        // Render Twig
        $this->renderTwig();
    }
}