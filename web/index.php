<?php
/** launchpad for test */

require_once '../vendor/autoload.php';


$app = new Silex\Application();

$app->get('/', function() use($app) {
    return 'root path!';
});

$app->get('/hello/{name}', function($name) use($app) {
    return 'Hello '.$app->escape($name);
});

$app->run();