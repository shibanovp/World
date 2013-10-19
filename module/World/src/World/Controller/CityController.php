<?php

namespace World\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use World\Model\EntityHelper;

class CityController extends AbstractActionController
{
    use EntityHelper;
    private $entityManager;
    public function __construct (\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        //$res = $this->entityManager->getRepository('World\Entity\City')->findAll();
        //var_dump($res);
    }
    public function indexAction()
    {
        var_dump($this->parseParams($this->params()->fromRoute('id', 0)));
        return new ViewModel();
    }

    public function showAction()
    {
        return new ViewModel();
    }

    public function editAction()
    {
        return new ViewModel();
    }

    public function addAction()
    {
        return new ViewModel();
    }

    public function deleteAction()
    {
        return new ViewModel();
    }


}

