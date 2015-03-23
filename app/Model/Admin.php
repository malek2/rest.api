<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');


class Admin extends AppModel {
    
       var $mongoSchema = array(
        'username' => array('type' => 'string'),
        'password' => array('type' => 'string'),  
        'email' => array('type' => 'string'),
        'role' => array('type' => 'string'),
        
    );

      public function beforeSave($options = null) {
        parent::beforeSave($options = null);
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
    
}
