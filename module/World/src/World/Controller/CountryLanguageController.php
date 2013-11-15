<?php
namespace World\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class CountryLanguageController extends AbstractActionController
{
    use \World\Model\EntityHelper;
    private $entityManager;
    public function __construct (\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {
        $params = $this->parseParams($this->params()->fromRoute('id', 0),$resultMap=array(50,100,200,300,400));
        $entityName ='World\Entity\CountryLanguage';
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
        $params = $this->params()->fromRoute('id', 0);
        $arr = explode('&', $params);
        if(!empty($arr[0])){
            $entityName ='World\Entity\CountryLanguage';
            if(!empty($arr[1]))
                $countryLanguage = $this->entityManager->getRepository($entityName)->findOneBy(array('language'=>$arr[0],'countrycode'=>$arr[1]));
            else 
                $countryLanguage = $this->entityManager->getRepository($entityName)->findOneBy(array('language'=>$arr[0]));            
            if ($countryLanguage)
                return new ViewModel(array(
                    'countrylanguage'=>$countryLanguage,
                    'getters'=>$this->getEntityGetters($entityName)));
        }
        return $this->redirect()->toRoute('world');
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

