<?php


namespace App\Models;

class TaskModel extends MVCModel
{
    public function getResultsA()
    {
        $sql = 'SELECT 
            dispatcher.id AS id, 
            tasks.title AS title, 
            tasks_description.description AS description, 
            results.result AS result, 
            results_img.img_1x AS img1x, 
            results_img.img_2x AS img2x, 
            results_img.img_3x AS img3x, 
            results_link.link AS link, 
            results_link.linktext AS linktext,
            dispatcher.fk_results_query AS exampleId
            FROM dispatcher 
            LEFT JOIN results ON results.id = dispatcher.fk_results
            LEFT JOIN tasks ON tasks.id = dispatcher.fk_results_tasks
            LEFT JOIN tasks_description ON tasks_description.id = dispatcher.fk_results_description
            LEFT JOIN results_img ON results_img.id = dispatcher.fk_results_img
            LEFT JOIN results_link ON results_link.id = dispatcher.fk_results_link
            WHERE dispatcher.id BETWEEN 1 AND 14
            ORDER BY dispatcher.id ASC';

            // bind the Value to the Database field at that type
            $bind = array(
//              ':id'=>array(
//                  'value' => 1,
//                  'type' => false
//              )
            );
        $this->resultsObj($sql, $bind);




        return $this->resultsObj($sql, $bind);
    }

    public function getResultsB()
    {
        $sql = 'SELECT 
            dispatcher.id AS id, 
            tasks.title AS title, 
            tasks_description.description AS description, 
            results.result AS result, 
            results_img.img_1x AS img1x, 
            results_img.img_2x AS img2x, 
            results_img.img_3x AS img3x, 
            results_link.link AS link, 
            results_link.linktext AS linktext,
            dispatcher.fk_results_query AS exampleId
            FROM dispatcher 
            LEFT JOIN results ON results.id = dispatcher.fk_results
            LEFT JOIN tasks ON tasks.id = dispatcher.fk_results_tasks
            LEFT JOIN tasks_description ON tasks_description.id = dispatcher.fk_results_description
            LEFT JOIN results_img ON results_img.id = dispatcher.fk_results_img
            LEFT JOIN results_link ON results_link.id = dispatcher.fk_results_link
            WHERE dispatcher.id BETWEEN 15 AND 25 
            ORDER BY dispatcher.id ASC';

        // bind the Value to the Database field at that type
        $bind = array(
//              ':id'=>array(
//                  'value' => 1,
//                  'type' => false
//              )
        );
        $this->resultsObj($sql, $bind);




        return $this->resultsObj($sql, $bind);
    }

    public function getResultsC()
    {
        $sql = 'SELECT 
            dispatcher.id AS id, 
            tasks.title AS title, 
            tasks_description.description AS description, 
            results.result AS result, 
            results_img.img_1x AS img1x, 
            results_img.img_2x AS img2x, 
            results_img.img_3x AS img3x, 
            results_link.link AS link, 
            results_link.linktext AS linktext,
            dispatcher.fk_results_query AS exampleId
            FROM dispatcher 
            LEFT JOIN results ON results.id = dispatcher.fk_results
            LEFT JOIN tasks ON tasks.id = dispatcher.fk_results_tasks
            LEFT JOIN tasks_description ON tasks_description.id = dispatcher.fk_results_description
            LEFT JOIN results_img ON results_img.id = dispatcher.fk_results_img
            LEFT JOIN results_link ON results_link.id = dispatcher.fk_results_link
            WHERE dispatcher.id BETWEEN 26 AND 49 
            ORDER BY dispatcher.id ASC';

        // bind the Value to the Database field at that type
        $bind = array(
//              ':id'=>array(
//                  'value' => 1,
//                  'type' => false
//              )
        );
        $this->resultsObj($sql, $bind);




        return $this->resultsObj($sql, $bind);
    }
}