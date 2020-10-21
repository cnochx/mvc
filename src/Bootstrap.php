<?php

namespace App;

use lessc;

class Bootstrap
{
    // Hold the $_GET Parameter as an array
    private $get = array();

    /**
     * Config constructor.
     * @param $get: (Array): The $_GET Parameter, with that in .htaccess
     * defined Parameter req, res and next
     * @Results: Fill that $this->get
     */
    public function __construct(){

        if($_SERVER['QUERY_STRING'] === '')  {
            $this->get['req'] = 'index';
            $this->get['res'] = '';
            $this->get['next'] = '';
        } else {
            foreach ($_GET as $key => $value) {
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
                }
            }
        }
    }

    /**
     * Execute the Webapp
     * @Results: the Rendered Websites or a 404
     */
    final public function run()
    {
        /*$less = new lessc;
        $less->checkedCompile("../input.less", "output.css");*/


        // Create the Router
        $router = new Routing($this->get);
        $router->execute();
    }
}