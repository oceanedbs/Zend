<?php
class Application_Form_Admin_Aziende_Add extends Zend_Form
{
	protected $_adminModel;

	public function init()
	{
		$this->_adminModel = new Application_Model_Admin();
		$this->setMethod('post');
		$this->setName('addaziende');
		$this->setAction('');
		$this->setAttrib('enctype', 'multipart/form-data');

		$this->addElement('text', 'P_Iva', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(1, 10))
            ),
                    'required'   => true,
            'label'      => 'Partita Iva',
            ));
                
                $this->addElement('text', 'nome', array(
            'label' => 'Nome Azienda',
            'filters' => array('StringTrim'),
            'required' => true,
            'validators' => array(array('StringLength',true, array(1,25))),
		));
                
                $this->addElement('file', 'logo', array(
			'label' => 'Logo',
			'destination' => APPLICATION_PATH . '/../public/images/aziende',
			'validators' => array( 
			//array('Count', false, 1),
			array('Size', false, 102400),
			array('Extension', true, array('jpg', 'gif'))),
			));
                
                $this->addElement('text', 'indirizzo', array(
            'label' => 'Indirizzo',
            'required' => true,
            'filters' => array('StringTrim'),
            'validators' => array(array('StringLength',true, array(1,30))),
		));
                
               
                
               $this->addElement('select', 'tipologia', array(
            'label' => 'Tipologia',
                'required'   => true,
            'multiOptions' => array('vestiti' => 'Vestiti', 'sport' => 'Sport', 'cibo' => 'Cibo'),
		));
                
            $this->addElement('text', 'citta', array(
            'label' => 'Citta',
            'filters' => array('StringTrim'),
            'required' => true,
            'validators' => array(array('StringLength',true, array(1,25))),
		));
                
            
            
            $this->addElement('text', 'descrizione', array(
            'label' => 'Descrizione Breve',
            'required' => true,
            'filters' => array('StringTrim'),
            'validators' => array(array('StringLength',true, array(1,30))),
		));
            
            $this->addElement('submit', 'add', array(
            'label' => 'Aggiungi Azienda',
		));
                
                 
	}
}