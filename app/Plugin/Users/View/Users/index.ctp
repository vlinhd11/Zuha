<?php 
echo $this->Element('scaffolds/index', array('data' => $users)); 

// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Users',
		'items' => array(
			 $this->Html->link(__('New User', true), array('action' => 'register')),
			 )
		),
	array(
		'heading' => 'User Roles',
		'items' => array(
			 $this->Html->link(__('List User Roles', true), array('controller' => 'user_roles', 'action' => 'index')),
			 )
		),
	)));?>
