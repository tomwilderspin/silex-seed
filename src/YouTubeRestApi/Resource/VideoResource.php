<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 02/11/14
 * Time: 20:45
 */

namespace YouTubeRestApi\Resource;


class VideoResource {

    /**
     * @var \Google_Service_YouTube
     */
    private $youTubeService;


    public function __construct(\Google_Service_YouTube $youTubeService)
    {
        $this->youTubeService = $youTubeService;
    }


    public function fetchList()
    {
        $results = $this->youTubeService->videos->listVideos('snippet');

        return $results->getItems();
    }

} 