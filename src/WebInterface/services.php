<?php

/**
 * Controllers
 */

$app['video.controller'] = $app->share(function($app){

    return new \Controller\VideoController();

});


/**
 * Handler
 */

$app['video.handler'] = $app->share(function($app){

    return new \Handler\ListHandler($app['listAllVideos.interactor']);

});


/**
 * Interactor
 */

$app['listAllVideos.interactor'] = $app->share(function($app){

    return new \Application\Interactor\ListAllVideos($app['video.resource']);

});


/**
 * Google API client & YouTube resources
 */

$app['googleClient'] = $app->share(function($app){

    $googleClient = new Google_Client();

    $googleClient->setApplicationName('video browser');
    $googleClient->setDeveloperKey($app['global.config']['youTubeApiKey']);
    return $googleClient;

});


$app['youTube.service'] = $app->share(function($app){

    $resources = new \YouTubeRestApi\Initialization\ApiResourceFactory($app['googleClient']);

    return $resources;

});

$app['video.resource'] = $app->share(function($app){

    $service = $app['youTube.service'];
    return $service->getVideoResource();
});