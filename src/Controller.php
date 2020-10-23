<?php

namespace App;

use Twig\Extension\DebugExtension;
use Dotenv\Dotenv;
use Twig\Environment;
use Twig\Loader;

class Controller
{
    /**
     * Hold Variable for the Twig template as Array
     * @Example: ['siteName' => 'Name of your App']
     */
    protected $twigVars = array();

    /**
     * Hold the name of the Template as String
     */
    protected $template;
    /**
     * Construct the Twig
     * @Results: (Instanced Class) return complete Twig APi
     */
    public function constrTwig(){
        // define Twig with the template-folder
        $loader = new Loader\FilesystemLoader('../templates');
        // integrate the Environment Options
        $environment = $this->envTwig();
        $twig = new Environment($loader, $environment);
        // Integrate Twig Extensions
        $twig = $this->extTwig($twig);
        return $twig;
    }

    /**
     * Define the Environment options
     * @Results: (array) return an Array with Environment Options
     */
    public function envTwig(){
        // define the Environment options in all Environments
        $environment = array(
            'charset' => 'utf-8',
            'strict_variables' => true,
            'autoescape' => 'html'
        );
        // get Dotenv
        $dotenv = Dotenv::createImmutable('../');
        $dotenv->load();
        // define the Environment options in Dev-Environment
        if($_ENV['ENV'] === 'Dev') {
            $environment['debug'] = true;
            $environment['auto_reload'] = false;
            $environment['cache'] = false;
        } else {
            $environment['auto_reload'] = true;
            $environment['cache'] = '../cache/compilation_cache';
            $environment['debug'] = false;
        }
        return $environment;
    }

    /**
     * Add Extension to Twig
     * @param $twig: (Instanced Class) The already prepared Instanced Class of Twig (to loop trough)
     * @return mixed: (Instanced Class) The Instanced Class with added Extensions
     */
    public function extTwig($twig){
        // Core, Escaper, and Optimizer extensions are registered by default, no own extension defined
        // add build-in Extensions for Twig in Dev-Environment
        if($_ENV['ENV'] === 'Dev') {
            // defines the dump function
            $twig->addExtension(new DebugExtension());
        }
        return $twig;
    }

    /**
     *  Set the filename of the template
     *  @param $template: (string) the name of the template (without any extension)
     *  @result: (void) Put the filename of the template in $this->template
     */
    public function setTemplate($template){
       $this->template = strtolower(trim($template));
    }

    /**
     * Get the filename of the template with extension
     * @return string (string) the filename of the template
     */
    public function getTemplate(){
        return $this->template.'.html.twig';
    }

    /**
     * Set the Twig Variables in an array
     * @param $varKey (String): The String of the array, in Twig this key is called
     * @param $varValue (Mixed): The Value of that variable Twig called
     */
    public function setVars($varKey, $varValue) {
        $this->twigVars[trim($varKey)] = $varValue;
    }

    /**
     *  Render the template
     *  @result: Echo the Instanced Class of Twig
     */
    public function renderTwig(){
        $twig = $this->constrTwig();
        echo $twig->render($this->getTemplate(), $this->twigVars);
    }


}