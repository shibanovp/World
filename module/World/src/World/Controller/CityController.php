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
        $params = $this->parseParams($this->params()->fromRoute('id', 0));
        $entityName ='World\Entity\City';
        $paginator=  $this->getPaginator(
                $this->entityManager,
                $entityName, 
                $params['maxResult'], 
                $params['page']);
        $getters =  $this->getEntityGetters($entityName);
        var_dump($getters);
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

