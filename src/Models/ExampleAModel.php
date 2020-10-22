<?php


namespace App\Models;


class ExampleAModel extends Tlnverwaltung
{
    final public function getQuery($id) {
        $sql = '';

        // bind the Value to the Database field at that type
        $bind = array(
//              ':id'=>array(
//                  'value' => $id,
//                  'type' => false
//              )
        );
        $this->resultsObj($sql, $bind);
    }
}