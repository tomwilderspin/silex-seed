<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 14/11/14
 * Time: 08:59
 */

namespace Handler;


use Application\Interactor\ListInterface;

class ListHandler {


    private $interactor;

    private $templateEnvironment;

    private $templateName;


    public function __construct(
        ListInterface $interactor,
        \Twig_Environment $templateEnvironment,
        $templateName
    ) {
        $this->interactor = $interactor;
        $this->templateEnvironment = $templateEnvironment;
        $this->templateName = $templateName;
    }


    public function get()
    {
        $result = $this->interactor->getList();
        $responseContent = array(
            'videos' => array(),
        );
        foreach ($result as $video) {
            $responseContent['videos'][] = array(
                'name' => $video['name'],
            );
        }

        return $this->templateEnvironment->render(
            $this->templateName,
            $responseContent
        );
    }


} 