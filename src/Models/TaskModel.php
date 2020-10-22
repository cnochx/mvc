<?php


namespace App\Models;

class TaskModel extends MVCModel
{
    /**
     * final property for db-query
     * @return mixed the results as Obj
     */
    final public function getResultsA()
    {
        // SQL query
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
            dispatcher.fk_results_query AS example
            FROM dispatcher 
            LEFT JOIN results ON results.id = dispatcher.fk_results
            LEFT JOIN tasks ON tasks.id = dispatcher.fk_results_tasks
            LEFT JOIN tasks_description ON tasks_description.id = dispatcher.fk_results_description
            LEFT JOIN results_img ON results_img.id = dispatcher.fk_results_img
            LEFT JOIN results_link ON results_link.id = dispatcher.fk_results_link
            WHERE dispatcher.id BETWEEN 1 AND 14
            ORDER BY dispatcher.id';

            // bind the Values
            $bind = array();

        return $this->resultsObj($sql, $bind);
    }

    /**
     * final property for db-query
     * @return mixed the results as Obj
     */
    final public function getResultsB()
    {
        // SQL query
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
            dispatcher.fk_results_query AS example
            FROM dispatcher 
            LEFT JOIN results ON results.id = dispatcher.fk_results
            LEFT JOIN tasks ON tasks.id = dispatcher.fk_results_tasks
            LEFT JOIN tasks_description ON tasks_description.id = dispatcher.fk_results_description
            LEFT JOIN results_img ON results_img.id = dispatcher.fk_results_img
            LEFT JOIN results_link ON results_link.id = dispatcher.fk_results_link
            WHERE dispatcher.id BETWEEN 15 AND 25 
            ORDER BY dispatcher.id';

        // bind the Values
        $bind = array();

        return $this->resultsObj($sql, $bind);
    }

    /**
     * final property for db-query
     * @return mixed the results as Obj
     */
    final public function getResultsC()
    {
        // SQL query
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
            dispatcher.fk_results_query AS example
            FROM dispatcher 
            LEFT JOIN results ON results.id = dispatcher.fk_results
            LEFT JOIN tasks ON tasks.id = dispatcher.fk_results_tasks
            LEFT JOIN tasks_description ON tasks_description.id = dispatcher.fk_results_description
            LEFT JOIN results_img ON results_img.id = dispatcher.fk_results_img
            LEFT JOIN results_link ON results_link.id = dispatcher.fk_results_link
            WHERE dispatcher.id BETWEEN 26 AND 49 
            ORDER BY dispatcher.id';
        // bind the Values
        $bind = array();

        return $this->resultsObj($sql, $bind);
    }

    /**
     * @param $id (int) the Primary for the query
     * @return mixed the Result as an Array
     */
    final public function getExampleQuery($id) {
        // SQL query
        $sql ='SELECT example FROM results_query WHERE id=:id';
        $bind = array(
            ':id' => array(
                'value' => $id,
                'type' => false
            )
        );
        // the Results as an Array
        $example = $this->resultsArrSingle($sql, $bind);
        return $example['example'];
    }
}