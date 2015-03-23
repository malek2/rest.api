<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

/**
 * CakePHP Faqs
 * @author George
 */
class Faq extends AppModel {

    public $name = 'Faqs';
    var $mongoSchema = array(
        'question' => array('type' => 'string'),
        'reponse' => array('type' => 'string'),
    );

}
