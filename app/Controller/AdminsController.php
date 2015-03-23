<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP AdminController
 * @author George
 */
class AdminsController extends AppController {

    public function index() {
        $admins = $this->Admin->find('all');
        $this->set(compact('admins'));
    }

    
     public function edit($id = null) {
        if ($id != null) {
            $this->Admin->id = $id;
        }
        $message = "";
        if ($this->request->is(array('put', 'post'))) {
            if (!empty($this->request->data)) {
                if ($this->Admin->save($this->request->data)) {
                    $message = "success";
                } else {
                    $message = "error";
                }
            }
        } else {
            $this->request->data = $this->Admin->read();
            $this->set('admins', $this->Admin->read());
        }
    }

    public function delete($id = null) {
        $this->Admin->id = $id;
        if ($this->Admin->delete($id, true)) {
            
        }
    }
}
