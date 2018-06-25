<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . '/controllers/test/MyToast.php');

class HelloTest extends MyToast{
	
	function __construct() {
		parent::__construct('HelloTest');
	}
	
	// A mensagem abaixo nao eh exibida, pois o teste nao dah erro
	function test_that_succeed() {
		// cria um resultado
		$x = log10(10);
		$this->_assert_equals($x, 1, 'Uhuu! O trem funciona!');
	}
	
	// note que a mensagem deve ser escrita para orientar o testador
	// sobre o que estah dando errado no teste 
	function test_that_fail() {
		$x = log(2, 2);
		$this->_assert_equals($x, 2, "Oooops... $x is not equals 2!");
	}
	
}