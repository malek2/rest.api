
<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * CakePHP ClientsController
 * @author George
 */
class ClientsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function add() {
        if ($this->request->is(array('ajax', 'post'))) {
            
        }
    }

    public function NotEqualString($string1, $string2) {
        if ($string1 !== $string2) {
            return true;
        }
        return false;
    }

    public function edit_client($id = null) {

        if ($id !== null) {
            $this->Client->id = $id;
        }
        if ($this->request->is(array('ajax', 'post', 'put'))) {
            $this->layout = false;
            $domaine['name'] = $this->request->data['domain'];
            unset($this->request->data['domain_name']);
            $clients = $this->request->data;
            if (empty($this->request->data['id'])) {
                $this->Client->Domain->save($domaine);
                $last_id = $this->Client->Domain->getLastInsertID();
                $clients['domain_id'] = $last_id;
            } else {
                $client = $this->Client->find('first', array(
                    'conditions' => array('id' => $this->request->data['id'])
                ));

                if ($this->NotEqualString($domaine['name'], $client['Domain']['name'])) {
                    $this->Domain->id = $client['Domain']['id'];
                    $this->Domain->saveField('name', $domaine['name']);
                }
            }
            if ($this->Client->save($clients)) {
                $this->set('client', 'success');
//                $Email = new CakeEmail();
//                $Email->from('nebiha.malek@gmail.com')
//                        ->to($this->request->data['Client']['email'])
//                        ->emailFormat('text')
//                        ->viewVars(array('domain' => $this->request->data['Client']['domain']))
//                        ->send();
            } else {
                $this->set('client', 'error');
            }
        } else {
            $this->set('client', $this->Client->read());
        }
    }

    public function index() {
        header('Access-Control-Allow-Origin: http://dbnews.largestinfo.pro');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        $clients = $this->Client->find('all');
        $this->set(compact('clients'));
    }

    public function delete_client($id = null) {
        $this->Client->id = $id;
        $domain = $this->Client->read();
        $domainId = $domain['Client']['domain_id'];
        if ($this->Client->delete($id, true)) {
            $this->Domain->delete($domainId);
            $this->Session->setFlash(
                    __('Le post avec id : %s a été supprimé.', h($id))
            );
            return $this->redirect(array('action' => 'index'));
        }
    }

}
