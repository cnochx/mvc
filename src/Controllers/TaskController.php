<?php

namespace App\Controllers;

use App\Controller;
use App\Models\ExampleProjektverwaltungModel;
use App\Models\ExampleTlnverwaltungModel;
use App\Models\TaskModel;
use Dotenv\Dotenv;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->setTemplate('task');
    }

    public function prepareExampleValue($results)
    {
       $get = null;
        foreach ($results as $key=>$value){
            if($key === 'example' && $value !== null) {
                $get = $value;
            }
        }
        return $get;
    }

    /**
     * @param $taskModel (mixed) Define the Task Model
     * @param $taskResults (mixed) define the Property of the Task Model
     * @param $exampleModel (mixed) Define the Example Model
     * @return mixed the Replaced Property from Task mMdel
     */
    public function replaceExample($taskModel, $taskResults, $exampleModel)
    {
        // loop through the property
        foreach ($taskResults as $key=>$value) {
            // don't think, simply follow the properties
            if($this->prepareExampleValue($value)) {
                // get the Results of the Example query
                $results = $exampleModel->dynResults($taskModel->getExampleQuery($this->prepareExampleValue($value)));
                // replace the foreign key of the $taskResults with a big smile
                $taskResults[$key]->example = $results;
            }
        }
        return $taskResults;
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
        $taskModel = new TaskModel();
        // Get the example Statement and replace the foreign key with the Statement
        $taskResults = $this->replaceExample($taskModel, $taskModel->getResultsB(), new ExampleTlnverwaltungModel());

        // Transfer the results
        $this->setVars('results', $taskResults);

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
        $taskModel = new TaskModel();
        // Get the example Statement and replace the foreign key with the Statement
        $taskResults = $this->replaceExample($taskModel, $taskModel->getResultsC(), new ExampleProjektverwaltungModel());

        $this->setVars('results', $taskResults);

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