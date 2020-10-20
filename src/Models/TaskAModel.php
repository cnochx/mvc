<?php


namespace App\Models;

class TaskAModel extends MVCModel
{
    public function getTaskResults(){
        $sql = 'SELECT task_a.id, task_a.task, result_a.result, result_img.img_1x, result_img.img_2x, result_img.img_3x
            FROM result_a
            INNER JOIN task_a ON task_a.id = fk_task_a
            LEFT JOIN result_img ON result_img.id = result_a.fk_result_img';
        // bind the Value to the Database field at that type
        $bind = array(
//            ':id'=>array(
//                'value' => 1,
//                'type' => false
//            )
        );
        return $this->resultsObjSingle($sql, $bind);
    }
}