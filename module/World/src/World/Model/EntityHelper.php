<?php
namespace World\Model;
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
     * @return array assotiative array('maxResult'=>$maxResult,'page'=>$page,'ajax'=>$ajaxRequest);
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
        );
    }
}
