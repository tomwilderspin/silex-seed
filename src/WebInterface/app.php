<?php
/**
 * Silex app init
 */
ini_set('display_errors', 1);
ini_set('error_reporting' , E_ALL);

require_once __DIR__.'/../../vendor/autoload.php';

$app = new \Silex\Application();

if (getenv('DEV_MODE') == 1) {

    $app['debug'] = true;
}

// global config
$app['global.config'] = require_once __DIR__.'/../../config/global.php';

require_once __DIR__.'/providers.php';

require_once __DIR__.'/services.php';

require_once __DIR__.'/routes.php';

return $app;