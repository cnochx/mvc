<?php

namespace App\Models;

use App\Model;

class ProjektverwaltungModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->projektverwaltungPDO();
    }
    protected function projektverwaltungPDO(){
        // Integrate dotenv
        $this->dotenv->load();
        // data source name
        $dsn = 'mysql:host='.$_ENV['DB_HOST_PROJEKTVERWALTUNG'].';port='.$_ENV['DB_PORT_PROJEKTVERWALTUNG'].';dbname='.$_ENV['DB_NAME_PROJEKTVERWALTUNG'].';charset=utf8';

        $this->doPDO($dsn, $_ENV['DB_USER_PROJEKTVERWALTUNG'], $_ENV['DB_PASS_PROJEKTVERWALTUNG'], $this->optionsPDO());
    }
}