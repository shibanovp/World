<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace World\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    use \World\Model\EntityHelper;
    private $entityManager;
    public function __construct (\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {
        $query = $this->entityManager->createQuery("SELECT c FROM World\Entity\Country c WHERE 
            c.code LIKE :search
            OR c.name LIKE :search
            OR c.region LIKE :search
            OR c.surfacearea LIKE :search
            OR c.indepyear LIKE :search
            OR c.population LIKE :search
            OR c.lifeexpectancy LIKE :search
            OR c.gnp LIKE :search
            OR c.gnpold LIKE :search
            OR c.localname LIKE :search
            OR c.governmentform LIKE :search
            OR c.headofstate LIKE :search
            OR c.capital LIKE :search
            OR c.code2 LIKE :search
            OR c.continent LIKE :search");
        $query->setParameter('search', '%1980%');
        $query->setMaxResults(5);
        $results = $query->getResult();
//        var_dump($results);
        $vm =new ViewModel();
        $vm->setTerminal(TRUE);
        return $vm;
    }
}
