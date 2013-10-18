<?php

namespace World\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CityController extends AbstractActionController
{
    private $entityManager;
    public function __construct (\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $res = $this->entityManager->getRepository('World\Entity\City')->findAll();
        var_dump($res);
    }
    public function indexAction()
    {
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

