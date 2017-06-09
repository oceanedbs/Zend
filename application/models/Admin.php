<?php

class Application_Model_Admin extends App_Model_Abstract
{ 

	public function __construct()
    {
    }

    public function getSubCats()
    {
        return $this->getResource('Category')->getSubCats();
    }
    
    public function saveStaff($info)
    {
    	return $this->getResource('Utente')->insertStaff($info);
    }
   
    public function getUserByName($info)
    {
    	return $this->getResource('Utente')->getUserByName($info);
    }
}