<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 02/11/14
 * Time: 17:43
 */

namespace Application\Controller;


use YouTubeRestApi\Resource\VideoResource;

class ListAllVideos {

    /**
     * @var \YouTubeRestApi\Resource\VideoResource
     */
    private $videoResource;

    public function __construct(VideoResource $videoResource)
    {
        $this->videoResource = $videoResource;
    }

    public function getList()
    {

        $videoDetails = $this->videoResource->fetchList();

    }

} 