<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP Stats_faqs
 * @author George
 */
class Stats_faqs extends AppModel {
      
    
    public $name = 'Stats_faqs';
    
public $mongoSchema = array(
    
        'id' => array('type' => 'integer'),
        'content' => array('type' => 'string'),
        'reponse' => array('type' => 'string'),
        'client_id' => array('type' => 'integer'),
        'faqs_id' => array('type' => 'integer'),
            
    
     );
}
