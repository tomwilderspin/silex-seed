<?php
/** launchpad for test */

require_once '../vendor/autoload.php';

$app = new Silex\Application();

// global config
$app['global.config'] = require_once '../config/global.php';

$app->register(new \Silex\Provider\ServiceControllerServiceProvider());

require_once '../src/WebInterface/services.php';
require_once '../src/WebInterface/routes.php';

$app->run();