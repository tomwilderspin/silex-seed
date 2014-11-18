<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 17/11/14
 * Time: 20:35
 */

namespace Functional;


use Silex\WebTestCase;

class GetVideoListsTest extends WebTestCase {


    public function createApplication()
    {
        $app =  require __DIR__.'/../../src/WebInterface/app.php';

        $app['debug'] = true;
        $app['exception_handler']->disable();

        return $app;
    }

    /** @test */
    public function it_returns_a_video_list()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET','/videos');

        $this->assertTrue($client->getResponse()->isOk());
    }



} 