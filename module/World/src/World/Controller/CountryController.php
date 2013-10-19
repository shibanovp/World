<?php

namespace World\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\Tools\Pagination\Paginator;

class CountryController extends AbstractActionController {
use \World\Model\EntityHelper;
    public function indexAction() {
        $em = $this->getServiceLocator()
                ->get('doctrine.entitymanager.orm_default');
        $params = $this->params('id', 0);
        if ($params) {
            $arr = explode('&', $params);
            $maxResult = (int) $arr[0];
            $page = abs((!empty($arr[1])) ? (int) $arr[1] : 1);
        }
        $resultMap=array(5,10,25,50,100);
        if (empty($maxResult)) {
            $maxResult = $resultMap[array_rand($resultMap)];
            $page = 1;
            $show = TRUE;
        } else {
            $show = FALSE;
        }
        $query = $em->createQuery('SELECT u FROM World\Entity\Country u')
                ->setFirstResult(($page - 1) * $maxResult)
                ->setMaxResults($maxResult);
        $paginator = new Paginator($query, $fetchJoinCollection = true);        
        $c = count($paginator);
        $pages = ceil($c / $maxResult);
        if (!$show)
            $this->layout('layout/table');        
        $getters = get_class_methods('World\Entity\Country');
        foreach ($getters as $k => $v)
            if (substr($v, 0, 3) != 'get')
                unset($getters[$k]);
        return new ViewModel(array(
            'paginator' => $paginator,
            'count' => $c,
            'pages' => $pages,
            'show' => $show,
            'getters' => $getters,
            'resultMap' =>$resultMap,
            'maxResult' =>$maxResult,
        ));
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

