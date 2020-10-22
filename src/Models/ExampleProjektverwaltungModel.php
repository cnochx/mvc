<?php


namespace App\Models;


class ExampleProjektverwaltungModel extends ProjektverwaltungModel
{
    public function dynResults($sql)
    {
        // bind the Values
        $bind = array();

        return $this->resultsArr($sql, $bind);
    }
}