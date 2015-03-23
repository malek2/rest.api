<?php
Router::parseExtensions('json');
Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
Router::connect('/session', array('controller' => 'users', 'action' => 'session'));
CakePlugin::routes();
require CAKE . 'Config' . DS . 'routes.php';
