<?php
/**
 * Silex app init
 */

require_once __DIR__.'/../../vendor/autoload.php';

$app = new \Silex\Application();

// global config
$app['global.config'] = require_once __DIR__.'/../../config/global.php';

require_once __DIR__.'/providers.php';

require_once __DIR__.'/services.php';

require_once __DIR__.'/routes.php';

return $app;