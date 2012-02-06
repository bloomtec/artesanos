<?php
/* Auditoria Test cases generated on: 2012-02-06 13:59:37 : 1328554777*/
App::uses('Auditoria', 'Model');

/**
 * Auditoria Test Case
 *
 */
class AuditoriaTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.auditoria', 'app.usuario', 'app.rol');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Auditoria = ClassRegistry::init('Auditoria');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Auditoria);

		parent::tearDown();
	}

}
