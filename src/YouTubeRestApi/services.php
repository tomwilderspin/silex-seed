<?php

/**
 * Google API client & YouTube resources
 */

$app['googleClient'] = $app->share(function() use ($app) {

    $googleClient = new Google_Client();

    $googleClient->setApplicationName('video browser');
    $googleClient->setDeveloperKey($app['youTubeApiKey']);
    return $googleClient;

});


$app['youTube.service'] = $app->share(function() use ($app) {

    $resources = new \YouTubeRestApi\Initialization\ApiResourceFactory($app['googleClient']);

    return $resources;

});

$app['video.resource'] = $app->share(function() use ($app) {

    $service = $app['youTube.service'];
    return $service->getVideoResource();
});