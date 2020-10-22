<?php

namespace App\Models;

use App\Model;

class TlnverwaltungModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tlnverwaltungPDO();
    }
    protected function tlnverwaltungPDO(){
        // Integrate dotenv
        $this->dotenv->load();
        // data source name
        $dsn = 'mysql:host='.$_ENV['DB_HOST_TLNVERWALTUNG'].';port='.$_ENV['DB_PORT_TLNVERWALTUNG'].';dbname='.$_ENV['DB_NAME_TLNVERWALTUNG'].';charset=utf8';

        $this->doPDO($dsn, $_ENV['DB_USER_TLNVERWALTUNG'], $_ENV['DB_PASS_TLNVERWALTUNG'], $this->optionsPDO());
    }
}