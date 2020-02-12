<?php

class ChickenController
{
    private $_f3; // Router
    private $_val; // Validation

    public function __construct($f3)
    {
        $this->_f3 = $f3;
        $this->_val = new Validation();
    }

    public function home()
    {
        $view = new Template();
        echo $view->render('views/all-about-chickens.html');
    }

    public function eggs()
    {
        $eggs = 3;
        if ($this->_val->validEggs($eggs)) {
            $this->_f3->set("eggs", $eggs);
            $view = new Template();
            echo $view->render('views/eggs.html');
        }
        else {
            $this->_f3->reroute("404");
        }
    }
}