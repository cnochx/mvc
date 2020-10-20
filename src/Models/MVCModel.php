<?php

namespace App\Models;

use App\Model;

class MVCModel extends Model
{
   public function __construct()
   {
       parent::__construct();
       $this->mvcPDO();
   }

    protected function mvcPDO()
    {
        // Integrate dotenv
        $this->dotenv->load();
        // data source name
        $dsn = 'mysql:host='.$_ENV['DB_HOST_MVC'].';port='.$_ENV['DB_PORT_MVC'].';dbname='.$_ENV['DB_NAME_MVC'].';charset=utf8';

        $this->doPDO($dsn, $_ENV['DB_USER_MVC'], $_ENV['DB_PASS_MVC'], $this->optionsPDO());
    }

}