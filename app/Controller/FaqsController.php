<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP FaqController
 * @author George
 */
class FaqsController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function index($apiKey = null) {
        $faqs = $this->Faq->find('all');
            $this->set(compact('faqs'));
//            echo json_encode($faqs);
//        //autorizer l'accès au webService from *
//        //echo Configure::read('Security.salt')."\n\r";
//        //echo json_encode($apiKey);
//        if (!empty($apiKey) && $apiKey === Configure::read('Security.salt')) {
//            $this->Auth->allow('index');
//            header('Access-Control-Allow-Origin: *');
//            $faqs = $this->Faq->find('all');
//            $this->set(compact('faqs'));
//            echo json_encode($faqs);
//            //$this->set(compact('faqs'));
//        }else{
//            $this->Auth->deny('index');
//        }
//        die();
    }

//    //    public function index() {
//        $faqs = $this->Faq->find('all');
//        $
//    }

    public function edit($id = null) {
        if ($id != null) {
            $this->Faq->id = $id;
        }
        $message = "";
        if ($this->request->is(array('put', 'post'))) {
            if (!empty($this->request->data)) {
                if ($this->Faq->save($this->request->data)) {
                    $message = "success";
                } else {
                    $message = "error";
                }
            }
        } else {
            $this->request->data = $this->Faq->read();
            $this->set('faqs', $this->Faq->read());
        }
    }

    public function delete($id = null) {
        $this->Faq->id = $id;
        if ($this->Faq->delete($id, true)) {
            
        }
    }

}
