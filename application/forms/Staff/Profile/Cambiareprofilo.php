<?php

class Application_Form_Staff_Profile_Cambiareprofilo extends App_Form_Abstract

{       protected $_utenteModel;

	public function init()
    {               
        $this->setMethod('post');
        $this->setName('cambiareprofilo');
        $this->setAction('');

        $this->_utenteModel = new Application_Model_Utente();
        
        
        $info = $this->_utenteModel->getInfoUtente();

        
    	 $this->addElement('text', 'nome_utente', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(1, 25))
            ),
            'required'   => true,
            'label'      => 'Nome',
            'decorators' => $this->elementDecorators,
            ));
         
          $this->addElement('text', 'cognome', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(1, 25))
            ),
            'required'   => true,
            'label'      => 'Cognome',
            'decorators' => $this->elementDecorators,
            ));
          
           $this->addElement('select', 'sesso', array(
            'label' => 'Sesso',
                'required'   => true,
            'multiOptions' => array('m' => 'M', 'f' => 'F'),
               'decorators' => $this->elementDecorators,
		));
           
           $this->addElement('text', 'data_nascita', array(
            'label' => 'Data di nascita',
                'required'   => true,
            'placeholder'=>'aaaa-mm-gg',
               'decorators' => $this->elementDecorators,
		));
           $this->addElement('text', 'telefono', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(1, 10))
            ),
                'required'   => true,
            'label'      => 'Telefono',
            'decorators' => $this->elementDecorators,
            ));
           
           $this->addElement('text', 'email', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(3, 25),
                 'EmailAddress' )
            ),
            'required'   => true,
            'label'      => 'E-mail',
            'decorators' => $this->elementDecorators,
            ));
           
           $this->addElement('hidden', 'role', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(1, 25))
            ),         
            
            'value'      =>'staff',
            'decorators' => $this->elementDecorators,
            ));
           
           $this->addElement('text', 'citta', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(1, 25))
            ),         
            'label'      => 'Città',
            'decorators' => $this->elementDecorators,
            ));
           
        $this->addElement('text', 'username', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                array('StringLength', true, array(3, 25))
            ),
            'required'   => true,
            'label'      => 'Username',
            'decorators' => $this->elementDecorators,
            ));
        
        $this->addElement('text', 'password', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(3, 25))
            ),
            'required'   => true,
            'label'      => 'Password',
            'decorators' => $this->elementDecorators,
            ));

        $this->addElement('submit', 'cambiareprofilo', array(
            'label'    => 'Cambiare',
            'decorators' => $this->buttonDecorators,
        ));

        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'table', 'class' => 'zend_form')),
        		array('Description', array('placement' => 'prepend', 'class' => 'formerror')),
            'Form'
        ));
        

      $this->nome_utente->setValue($info->nome_utente);
        $this->cognome->setValue($info->cognome);
        $this->sesso->setValue('f');

        $giorno = substr($info->data_nascita, 8, 2);
        $mese = substr($info->data_nascita, 5, 2);
        $anno = substr($info->data_nascita, 0, 4);
        $this->data_nascita->setValue("$giorno-$mese-$anno");
        $this->telefono->setValue($info->telefono);
        $this->email->setValue($info->email);
        $this->citta->setValue($info->citta);
        $this->username->setValue($info->username);
        $this->password->setValue($info->password);
        
        $path=APPLICATION_PATH;

$path.= "/services/it/Zend_Validate.php";

$translator = new Zend_Translate(

    array(
        'adapter' => 'array',
        'content' => $path,
        'locale'  => "it_IT",
        'scan' => Zend_Translate::LOCALE_DIRECTORY
    )
);
Zend_Validate_Abstract::setDefaultTranslator($translator);
    }
    
}
