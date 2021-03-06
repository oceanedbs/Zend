<?php

class Application_Resource_Coupon extends Zend_Db_Table_Abstract
{
    protected $_name    = 'coupon';
    protected $_primary  = 'cod_promozione';
    protected $_rowClass = 'Application_Resource_Coupon_Item';


    public function init()
    {
    }

    public function registraCoupon($data)
    {
         $this->insert($data);
    }
    
    public function verificareCoupon($idprodotto, $idutente)
    {
        $select = $this ->select()
                        ->where ('ID_utente = ?', $idutente)
                        ->where('cod_promozione = ?', $idprodotto);
        $result = $this->fetchRow($select);
        if(!empty($result)){
            return 0;
        }
        else {
            return 1;
        }
        
    }
    public function numeroCoupon()
    {
        $rowset   = $this->fetchAll();
 
        $rowCount = count($rowset);
                                
        return  $rowCount;
    }
    
    public function getCouponUtente($idutente){ 
     
    $select = $this->select() 
                    ->from('coupon') 
                    ->where('coupon.ID_utente IN (?)', $idutente) 
                    ->join('promozione', 'coupon.cod_promozione = promozione.cod_promozione') 
                    ->setIntegrityCheck(false); 
                     
                 
    return $this->fetchAll($select); 
     
    } 
     
    public function getCouponPromo($idpromo) 
    { 
        $select  = $this -> select()  
                        ->from('coupon', array('CouponPromo' => new Zend_Db_Expr('COUNT(*)')))
                          ->where('cod_promozione = ?', $idpromo);
                         
        //$rowCount = count($this->fetchAll()); 
         
        return $this->fetchAll($select); 
 
      
    } 


    

}