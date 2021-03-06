<?php


namespace YouTubeRestApi\Initialization;




use Application\Entity\Video;
use YouTubeRestApi\Resource\VideoResource;

class ApiResourceFactory {


    private $googleClient;

    private $youTubeService;


    public function __construct(\Google_Client $googleClient)
    {
        $this->googleClient = $googleClient;
    }

    private function getYouTubeService()
    {
        if(!$this->youTubeService) {
            $this->youTubeService = new \Google_Service_YouTube($this->googleClient);
        }

        return $this->youTubeService;
    }

    public function getVideoResource()
    {
        return new VideoResource($this->getYouTubeService(), 'Application\Entity\Video');
    }





} 