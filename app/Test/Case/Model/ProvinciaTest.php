<?php
/* Provincia Test cases generated on: 2012-02-08 09:38:33 : 1328711913*/
App::uses('Provincia', 'Model');

/**
 * Provincia Test Case
 *
 */
class ProvinciaTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.provincia', 'app.canton', 'app.local', 'app.calificacion', 'app.rama', 'app.artesano', 'app.balance', 'app.datos_personal', 'app.taller', 'app.ciudad', 'app.parroquia', 'app.aprendiz', 'app.equipos_de_trabajo', 'app.materias_prima', 'app.operador', 'app.productos_elaborado', 'app.tipos_de', 'app.tipos_de_calificacion');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Provincia = ClassRegistry::init('Provincia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Provincia);

		parent::tearDown();
	}

}
