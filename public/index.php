<?php
// integrate the autoloader (Libraries, Namespace)
require(dirname(__DIR__) . '/vendor/autoload.php');

// Run the Webapp
(new App\Bootstrap($_GET))->run();