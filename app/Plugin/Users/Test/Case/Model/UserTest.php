<?php
App::uses('User', 'Users.Model');

/**
 * UserRole Test Case
 *
 */
class UserTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.Aro',
		'plugin.Users.User',
		'plugin.Users.Used',
		'plugin.Contacts.Contact',
		);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('Users.User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}
    
	public function testAdd() {
		$data = array(
			'User' => array(
				'password' => 'asdDDFEF234424fasdf',
				'username' => 'byrnes.joel@razorit.com',
				'email' => 'byrnes.joel@razorit.com',
				'facebook_id' => '1102252405',
				'first_name' => 'Joel',
				'last_name' => 'Byrnes',
				'full_name' => 'Joel Byrnes',
				'user_role_id' => '3',
				'contact_type' => 'person',
				'forgot_key' => null,
				'forgot_key_created' => '2013-04-26 01:32:16',
				'parent_id' => '',
				'reference_code' => '2quif40p'
			)
		);
		
		$this->User->add($data);
		$user = $this->User->find('first', array('conditions' => array('User.email' => $data['User']['email'])));
		$this->assertEqual(1, count($user)); // user was added
		$contact = $this->User->Contact->find('first', array('conditions' => array('Contact.user_id' => $this->User->id)));
		$this->assertEqual(1, count($contact)); // contact for the user was added too
	}
    
	public function testProcreate() {
		// commented out because it is actually emailing, and it caused us to get blocked on gmail with our smtp server
		//
		// $data = array(
			// 'User' => array(
				// 'first_name' => 'Joe',
				// 'last_name' => 'Montana',
				// 'username' => 'joe-montana@example.com',
				// )
			// );
		// $this->User->procreate($data); // add user
		// $result = $this->User->find('first', array('conditions' => array('User.id' => $this->User->id)));
		// $this->assertTrue(!empty($result['User']['forgot_key']));
	}
	
}
