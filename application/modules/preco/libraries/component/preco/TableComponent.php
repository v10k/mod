<?php
include_once APPPATH.'modules\preco\libraries\Atualiza.php';

class TableComponent {



private $header_color;
private $cell_color = '';
private $indice = array();
private $dados = array();
private $id;

	public function __construct(array $indice) {
		$this->indice = $indice;
		$this->atualiza();
	}

	private function gera_indice() {
		$html = '';
		for($i = 0; $i < sizeof($this->indice); $i++) {
			$html .= '<th>'.$this->indice[$i].' </th>';
		}
		return $html;
	}

	public function set_id($id) {
		$this->id = $id;
	}

	public function set_data(array $dados) {
		$this->dados = $dados;
	}

	private function gera_data() {
		$html = '';
		for($i = 0; $i < sizeof($this->dados); $i++) {
			$html .= '<tr>';
			for($j = 0; $j < sizeof($this->dados[$i]); $j++) {
				$html .= '<td>'.$this->dados[$i][$j].' </td>';	
			}
			$html .= '<td><center><a href="?id='.$this->id[$i].'"><i class="fa fa-pencil fa-2x red-text"></center></td></a></tr>';
		}
		return $html;
	}

	private function atualiza($id = null) {
		$ci =& get_instance();
		$atualiza = new Atualiza();
		$id = isset($_GET['id']) ? $_GET['id'] : NULL;
		if(!empty($id)) {
   			$atualiza->atualizar($id);
   		}
	}

	private function getHeader() {
		return '<thead class="primary-color text-white">
		            <tr>'.$this->gera_indice().' </tr>
	        	</thead>';
	}

	private function getTableBody() {
		return '<tbody>'.$this->gera_data().'</tbody>';
	}

	public function getHTML(){
		return $this->getHeader().$this->getTableBody();
	}
}


?>