<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP UsersController
 * @author George
 */
class UsersController extends AppController {

    public $uses = array('User', 'Role');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'logout'); // We can remove this line after we're finished
        //$this->Auth->allow('init_admin'); // Init admin App
        //$this->Security->requireSecure();
    }

    public function session() {
        header('Access-Control-Allow-Origin: http://dbnews.largestinfo.pro');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        if ($this->Auth->login()) {
            // return $this->redirect($this->Auth->redirect());
            $message = array('user' => $this->Session->read('Auth.User.username'), 'status' => 200, 'response' => 'success');
            $this->set(array(
                'message' => $message,
                'type' => 'success',
                '_serialize' => array('user')
            ));
        }
        echo json_encode($message);
        die();
    }

    public function login() {
        header('Access-Control-Allow-Origin: http://dbnews.largestinfo.pro');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        $message = array();
        if ($this->Session->read('Auth.User')) {
            $message = array('message' => array('text' => __('You are logged in!'), 'type' => 'error'));
        }
        if ($this->request->is(array('ajax', 'post'))) {
            if ($this->Auth->login()) {
                // return $this->redirect($this->Auth->redirect());
                $message = array('user' => $this->Session->read('Auth.User.username'), 'status' => 200, 'response' => 'success');
                $this->set(array(
                    'message' => $message,
                    'type' => 'success',
                    '_serialize' => array('user')
                ));
            } else {
                $this->set(array(
                    'message' => array(
                        'text' => __('le nom d\'utilisateur ou le mot de passe est invalide !'),
                        'type' => 'error'
                    ),
                    '_serialize' => array('message')
                ));
                //$this->response->statusCode(401);
            }
        } else {
            $this->set(compact('message'));
        }
    }

    public function init_admin() {
        $roleExist = $this->Role->find('first', array(
            'conditions' => array('name' => 'root')
        ));
        $rootExist = $this->User->find('first', array(
            'conditions' => array('username' => 'root')
        ));
        if (empty($roleExist)) {
            $role = array('Role' => array('name' => 'root'));
            $this->Role->save($role);
            $last_role_id = $this->Role->getLastInsertID();
            if (empty($rootExist)) {
                $user = array('User' => array('username' => 'root', 'password' => 'x2yab9adw8', 'role_id' => $last_role_id));
                $this->User->save($user);
                die('done');
            }
        }
        die('fail');
    }

    public function logout() {
        if ($this->Auth->logout()) {
            $this->redirect(array('controller' => 'users', 'action' => 'login'));
            $this->set(array(
                'message' => array(
                    'text' => __('Logout successfully'),
                    'type' => 'info'
                ),
                '_serialize' => array('message')
            ));
        }
    }

}
