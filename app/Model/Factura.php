<?php
App::uses('AppModel', 'Model');
/**
 * Factura Model
 *
 * @property Provincia $Provincia
 * @property Canton $Canton
 * @property Ciudad $Ciudad
 * @property VentasEspecie $VentasEspecie
 */
class Factura extends AppModel {
	
	public $actsAs = array('Auditable');
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'fac_numero';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'fac_numero' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El número de factura es obligatorio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Ya existe una factura con el número ingresado',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fac_comprobante_deposito' => array(
			'validarComprobanteDeposito' => array(
				'rule' => array('validarComprobanteDeposito'),
				'message' => 'El número de comprobante debe ser único',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	/**
	 * Método de validación del comprobante de factura
	 * Se valida que si hay un comprobante de deposito ingresado que este sea único.
	 * @return : true si es un comprobante único, false en caso contrario.
	 */
	public function validarComprobanteDeposito() {
		$this -> recursive = -1;
		$factura = null;
		$this -> data['Factura']['fac_comprobante_deposito'] = trim($this -> data['Factura']['fac_comprobante_deposito']);
		if(!empty($this -> data['Factura']['fac_comprobante_deposito'])) {
			$factura = $this -> findByFacComprobanteDeposito($this -> data['Factura']['fac_comprobante_deposito']);
		}
		if($factura) {
			return false;
		} else {
			return true;
		}
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Provincia' => array(
			'className' => 'Provincia',
			'foreignKey' => 'provincia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Canton' => array(
			'className' => 'Canton',
			'foreignKey' => 'canton_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ciudad' => array(
			'className' => 'Ciudad',
			'foreignKey' => 'ciudad_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'VentasEspecie' => array(
			'className' => 'VentasEspecie',
			'foreignKey' => 'factura_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
