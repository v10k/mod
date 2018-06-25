<?php

include_once APPPATH.'modules\preco\libraries\Insere.php';

class FormComponent {

	public function getHTML(){
		return '
	<form action="'.$this->insere().'" method="POST">
    <label for="data" class="grey-text">Data da venda</label>
    <input name="data" type="date" required  id="data" class="form-control">
    <br>
    <label for="valor" class="grey-text">Nº de vendas</label>
    <input name="num" type="number" required id="valor" min="0" value="0" class="form-control">

    <div class="text-center mt-4">
        <button class="btn btn-indigo" type="submit">Cadastrar</button>
    </div>
	</form>';
	}

	public function insere() {
		$ci =& get_instance();
		$insere = new Insere();
		$data = isset($_POST['data']) ? $_POST['data'] : NULL;
   	$num = isset($_POST['num']) ? $_POST['num'] : NULL;
   	if(!empty($data) && !empty($num)) {
   			$insere->cadastra($ci->input->post("data"), $ci->input->post("num"));
   	}
	}

}


?>