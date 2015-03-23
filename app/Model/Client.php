<?php

App::uses('AppModel', 'Model');
App::uses('Domain', 'Model');

/**
 * CakePHP Client
 * @author George
 */
    class Client extends AppModel {

    var $mongoSchema = array(
        'username' => array('type' => 'string'),
        'password' => array('type' => 'string'),
        'rc' => array('type' => 'string'),
        'mf' => array('type' => 'string'),
        'email' => array('type' => 'string'),
        'adress' => array('type' => 'string'),
        'phone' => array('type' => 'integer'),
        'fax' => array('type' => 'integer'),
        'created' => array('type' => 'datetime'),
        'modified' => array('type' => 'datetime'),
        'domain_id' => array('type' => 'integer')
    );

    public function afterFind($results, $primary = false) {
        parent::afterFind($results, $primary);
        foreach ($results as $k => $result):
            //debug($result);
            $domain_id = $result['Client']['domain_id'];
            //debug($result);
            $domain = new Domain();
            $domainName = $domain->find('first', array('conditions' => array('_id' => $domain_id)));
            $created = date('Y-m-d',$result['Client']['created']->sec) ;
            $modified = date('Y-m-d (h:i:s)',$result['Client']['modified']->sec);
            $result['Client']['created'] = $created;
            $result['Client']['modified'] = $modified;
            $result['Domain']['id'] = $domainName['Domain']['id'];
            $result['Domain']['name'] = $domainName['Domain']['name'];
            $results[$k] = $result;
        endforeach;
        //debug($results);
//debug($results); die();
        return $results;
    }

    public $hasOne = array ('Domain' => array('dependent' => true));

}
