<?php

namespace App;

use Exception;

class Bootstrap
{
    private $get = array();

    /**
     * Config constructor.
     * @param $get: (Array): The $_GET Parameter, with that in .htaccess
     * defined Parameter req, res and next
     * @Results: Fill that $this->get
     */
    public function __construct($get){
        if(!empty($get)){
            foreach ($get as $key => $value) {
                $value = trim($value);
                switch ($key){
                    case 'req':
                        if(!empty($value)){
                            $this->get['req'] = $value;
                        } else {
                            $this->get['req'] = 'index';
                        }
                        break;
                    case 'res':
                        $this->get['res'] = $value;
                        break;
                    case 'next':
                        $this->get['next'] = $value;
                        break;
                    default:
                        unset($get[$key]);
                }
            }
        } else {
            $this->get['req'] = 'index';
            $this->get['res'] = '';
            $this->get['next'] = '';
        }
    }

    /**
     * Execute the Webapp
     * @Results: the Rendered Websites or a 404
     */
    final public function run()
    {
        /* Create the Router */
        $router = new Routing($this->get);
        $router->execute();

    }
}