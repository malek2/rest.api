<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP Requetes
 * @author George
 */
class Requete extends AppModel {
     public $name = 'Faqs';
    
public $mongoSchema = array(
    
        'id' => array('type' => 'integer'),
        'name' => array('type' => 'string'),
        'content' => array('type' => 'string'),
        'Client_id' => array('type' => 'integer'),
            
    
     );
    
}
