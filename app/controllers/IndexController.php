<?php
namespace App\Controllers;
use App\Models\Slide;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->setVar("soCute", "I love Toma");
        Slide::findFirstByid(1);
    }

}