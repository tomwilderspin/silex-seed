<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 14/11/14
 * Time: 08:43
 */

namespace Controller;


use Silex\Application;

class VideoController {


    public function listVideosAction(Application $app)
    {
        return $app['video.handler']->get();
    }

} 