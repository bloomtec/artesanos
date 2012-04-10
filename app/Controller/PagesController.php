<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       Cake.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

	/**
	 * Controller name
	 *
	 * @var string
	 */
	public $name = 'Pages';

	/**
	 * Default helper
	 *
	 * @var array
	 */
	public $helpers = array('Html', 'Session');

	/**
	 * This controller does not use a model
	 *
	 * @var array
	 */
	public $uses = array();

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('display', 'lanzador','formularioVitrina');
	}

	/**
	 * Displays a view
	 *
	 * @param mixed What page to display
	 * @return void
	 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this -> redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this -> set(compact('page', 'subpage', 'title_for_layout'));
		$this -> render(implode('/', $path));
	}

	public function lanzador() {
		$this -> layout = 'login';
	}
	public function formularioVitrina(){
		$this -> layout='externas';
		$this -> loadModel('Artesano');
		if(!empty($this -> request -> data)){
			foreach($this -> request -> data['Page'] as $key => $value){
				//debug(Inflector::humanize($key));
			}
		}
		//$nacionalidades = $this -> Artesano -> getValores(1);
		//$tipos_de_sangre = $this -> Artesano -> getValores(2);
		//$estados_civiles = $this -> Artesano -> getValores(3);
		//$grados_de_estudio = $this -> Artesano -> getValores(4);
		//$sexos = $this -> Artesano -> getValores(5);
		$ramas = $this -> Artesano -> Calificacion -> Rama -> find('list');
		$productos = $this -> Artesano -> getValores(18);
		$provincias = $this -> Artesano -> Calificacion -> Taller -> Provincia -> find('list');
		$this -> set(compact('ramas','productos','provincias'));
	}
}
