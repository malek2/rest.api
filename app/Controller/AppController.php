<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $components = array(
        'RequestHandler',
        'Session',
        //'Security',
        'Auth' => array(
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login'
            )
        )
    );
    public $uses = array('Client', 'Domain','Faq','Admin');

}
