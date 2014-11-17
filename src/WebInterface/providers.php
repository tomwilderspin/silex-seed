<?php
/**
 * Registered Silex providers
 */

$app->register(new \Silex\Provider\ServiceControllerServiceProvider());


$app->register(new \Silex\Provider\TwigServiceProvider(),array(
    'twig.path' => $app['global.config']['twigPath'],
));