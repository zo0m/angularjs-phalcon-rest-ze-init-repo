<?php

namespace App\Models;

class Slide extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $path;

    /**
     *
     * @var string
     */
    public $templateUrl;

    /**
     *
     * @var string
     */
    public $controller;
    /**
     *
     * @var integer
     */
    public $order_number;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'path' => 'path', 
            'templateUrl' => 'templateUrl', 
            'controller' => 'controller',
            'order_number' => 'order_number'
        );
    }

    public function getSource()
    {
        return "slide";
    }

}
