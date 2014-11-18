<?php


namespace Controller;


use Silex\Application;

class VideoController {


    public function listVideosAction(Application $app)
    {
        return $app['video.handler']->get();
    }

} 