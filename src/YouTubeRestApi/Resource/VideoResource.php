<?php


namespace YouTubeRestApi\Resource;


class VideoResource {

    /**
     * @var \Google_Service_YouTube
     */
    private $youTubeService;

    private $entityName;


    public function __construct(\Google_Service_YouTube $youTubeService, $entityName)
    {
        $this->youTubeService = $youTubeService;

        $this->entityName = $entityName;
    }


    public function fetchList()
    {
        $options = array(
            'chart' => 'mostPopular',
            'regionCode' => 'GB',
            'videoCategoryId' => '19',
        );

        $results = $this->youTubeService->videos->listVideos('snippet',$options);

        $videos = array();

        foreach ($results as $videoItem) {

            $video = new $this->entityName();

            $video->setName($videoItem['snippet']['title']);
            $video->setDetails($videoItem['snippet']['description']);

            $videos[] = $video;
        }

        return $videos;
    }

} 