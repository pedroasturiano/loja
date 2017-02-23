<?php
class categoriasController extends controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$dados = array();
		
		
		
		$this->loadTemplate('categorias', $dados);
	}

}
?>