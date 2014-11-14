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


    public function __construct(ListInterface $interactor)
    {
        $this->interactor = $interactor;
    }


    public function get()
    {
        $result = $this->interactor->getList();

        //todo needs template engine for view
        return json_encode($result);
    }


} 