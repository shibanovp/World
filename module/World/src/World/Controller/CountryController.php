<?php

namespace World\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CountryController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

