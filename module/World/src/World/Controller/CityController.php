<?php

namespace World\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



class CityController extends AbstractActionController
{
    use \World\Model\EntityHelper;
    private $entityManager;
    public function __construct (\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function indexAction()
    {
        $params = $this->parseParams($this->params()->fromRoute('id', 0));
        $entityName ='World\Entity\City';
        $paginator=  $this->getPaginator($this->entityManager,$entityName,$params['maxResult'],$params['page']);
        $count = count($paginator);
        $results = array_merge($params, array(
            'count' => $count,
            'pages' => ceil($count / $params['maxResult']),
            'paginator'=>$paginator,
            'getters'=> $this->getEntityGetters($entityName),                
        ));
        $viewModel=new ViewModel($results);
        if ($params['ajax'])
            $viewModel->setTerminal(TRUE);
        return $viewModel;
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

