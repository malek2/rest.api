<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP DomainsController
 * @author George
 */
class DomainsController extends AppController {

    public function add() {
        if ($this->request->is('post')) {
            if ($this->Domain->save($this->request->data)) {
                $this->Session->setFlash(__("Domain Ajouté"));
                $this->redirect(array('controller' => 'domains', 'action' => 'index'));
            }
        }
    }

    public function index() {
        $domains = $this->Domain->find('all');
        $this->set(compact('domains'));
    }

}
