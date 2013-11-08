<?php
namespace World\Model;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of EntityHelper
 *
 * @author Paul
 */
trait EntityHelper {
    
    /**
     * Parse params from route id and detect max results per page, page, ajax request or not, select random max
     * results from $resultMap if request is not ajax
     * @param string $params 
     * @param array $resultMap Map of possible max result options
     * @return array assotiative array('maxResult'=>$maxResult,'page'=>$page,'ajax'=>$ajaxRequest,'resultMap'=>$resultMap,);
     */
    public function parseParams($params, $resultMap=array(5,10,25,50,100)){
        if ($params) {
            $arr = explode('&', $params);
            $maxResult = (int) $arr[0];
            $page = abs((!empty($arr[1])) ? (int) $arr[1] : 1);
        }
        if (empty($maxResult)) {
            $maxResult = $resultMap[array_rand($resultMap)];
            $page = 1;
            $ajaxRequest = FALSE;
        } else 
            $ajaxRequest = TRUE;
        return array(
            'maxResult'=>$maxResult,
            'page'=>$page,            
            'ajax'=>$ajaxRequest,
            'resultMap'=>$resultMap,
        );
    }
    /**
     * Get paginator depends on  entity name, max result and page number
     * @param \Doctrine\ORM\EntityManager $entityManager Doctrine entity manager
     * @param string $entityName Entity for pagination
     * @param integer $maxResult How much results dispayed
     * @param integer $page=1 Page number
     * @return \Doctrine\ORM\Tools\Pagination\Paginator Paginator
     */
    public function getPaginator(\Doctrine\ORM\EntityManager $entityManager,$entityName,$maxResult,$page=1){
        $query = $entityManager->createQuery("SELECT u FROM $entityName u")
                ->setFirstResult(($page - 1) * $maxResult)
                ->setMaxResults($maxResult);
        $paginator = new Paginator($query, $fetchJoinCollection = FALSE);
        return $paginator;
    }
    /**
     * Get entity's methods begins with 'get'
     * @param string $entityName Entity
     * @return array getters
     */
    
    public function getEntityGetters($entityName){
        $getters = get_class_methods($entityName);
        foreach ($getters as $k => $v){
            if (substr($v, 0, 3) == 'get')
                $getters[substr($v, 3, strlen($v) - 3)]=$v;
            unset($getters[$k]);
        }
        return $getters;
    }
}
