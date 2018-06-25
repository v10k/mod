<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'modules\preco\libraries\component\preco\FormComponent.php';

class FormModel extends MY_Model{

	public function set_form() {
		$form = new FormComponent();
		return $form->getHTML();
	}

}