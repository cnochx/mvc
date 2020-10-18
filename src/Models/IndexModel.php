<?php

namespace App\Models;

use App\Model;

class IndexModel extends Model
{
    /**
     * Define the Query
     * @Results: (mixed) the Results of the Database
     */
    public function newPrep(){
        // the SQL
        $sql = 'SELECT bezeichner FROM projekt WHERE id = :id';
        // bind the Value to the Database field at that type
        $bind = array(
            ':id'=>array(
                'value' => 2,
                'type' => false
            )
        );
        return $this->resultsObj($sql, $bind);
    }
}