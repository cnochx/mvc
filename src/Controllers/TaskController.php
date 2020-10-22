<?php

namespace App\Controllers;

use App\Controller;
use App\Models\TaskModel;
use Dotenv\Dotenv;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->setTemplate('task');
    }

    public function prepareExampleQuery($results)
    {
        $print = null;
        foreach ($results as $key=>$value){
            if($key === 'exampleId' && $value !== null) {
                $print = $value;
            }
        }
        return $print;
    }

    /**
     * Render the Controller for page aufgabe_a
     */
    final public function renderA()
    {
        // Integrate TaskModel
        $model = new TaskModel();
        // Integrate the queries
        $results = $model->getResultsA();
        // Transfer the results
        $this->setVars('results', $results);

        $this->setVars('title', 'MySQL Aufgabe 1');
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
    /**
     * Render the Controller for page aufgabe_b
     */
    final public function renderB()
    {
       // Integrate TaskModel
        $model = new TaskModel();
        // get example ID
        foreach ($model->getResultsB() as $key=>$value) {
            if($this->prepareExampleQuery($value)) {
                $model->getExampleQuery($this->prepareExampleQuery($value));
            }
        }
        // Transfer the results
        $this->setVars('results', $model->getResultsB());

        $this->setVars('title', 'MySQL Aufgabe 2, Teil A');
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
    /**
     * Render the Controller for page aufgabe_c
     */
    final public function renderC()
    {
        // Integrate TaskModel
        $model = new TaskModel();
        // get example ID
        foreach ($model->getResultsC() as $key=>$value) {
            if($this->prepareExampleQuery($value)) {
                $model->getExampleQuery($this->prepareExampleQuery($value));
            }
        }
        // Transfer the results
        $this->setVars('results', $model->getResultsC());

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