<?php


namespace Application\Interactor;


use YouTubeRestApi\Resource\VideoResource;

class ListAllVideos implements ListInterface {

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
        $results = array();
        foreach($videoDetails as $videoItem) {
            $results[] = $videoItem->toArray();
        }

        return $results;
    }

} 