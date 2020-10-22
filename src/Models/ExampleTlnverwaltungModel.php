<?php


namespace App\Models;


class ExampleTlnverwaltungModel extends TlnverwaltungModel
{
    public function dynResults($sql)
    {
        // bind the Values
        $bind = array();

        return $this->resultsArr($sql, $bind);
    }

}