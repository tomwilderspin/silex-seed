<?php


namespace WebInterface\Controller;


use Silex\Application;

class VideoController {


    public function listVideosAction(Application $app)
    {
        return $app['video.handler']->get();
    }

} 