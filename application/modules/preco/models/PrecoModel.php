<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'modules\preco\libraries\component\preco\TableComponent.php';
include_once APPPATH.'modules\preco\libraries\Get_table.php';

class PrecoModel extends MY_Model{

	public function set_table_vendas() {
		$indice = array('Descrição', 'Valor unitário', 'Estoque', 'Vendas', 'Editar');
		$tabela = new TableComponent($indice);
		$tabela->set_data($this->trata_dados_vendas());
		$id = $this->get_id('mod_preco_vendas', 'id');
		$tabela->set_id($id);
		return $tabela->getHTML();
	}


	public function set_table_custos_variaveis() {
		$indice = array('Descrição', 'Custo', 'Editar');
		$tabela = new TableComponent($indice);
		$tabela->set_data($this->trata_dados_custos_variaveis());
		return $tabela->getHTML();
	}

	public function set_table_custos_fixos() {
		$indice = array('Descrição', 'Custo', 'Editar');
		$tabela = new TableComponent($indice);
		$tabela->set_data($this->trata_dados_custos_fixos());
		return $tabela->getHTML();
	}

	public function set_table_data() {
		$indice = array('Data da venda', 'Valor', 'Editar');
		$tabela = new TableComponent($indice);
		$tabela->set_data($this->trata_dados_vendas_data());
		return $tabela->getHTML();
	}

	public function get_id($tabela, $campo) {
		$conteudo = new Get_table();
		$query = $conteudo->get_id($tabela, $campo);
		$i = 0;
		$variavel;
		foreach($query->result() as $row) {
			$variavel[$i] = $row->$campo;
			$i++;
		}
		return $variavel;
	}

	public function trata_dados_custos_variaveis() {
		$conteudo = new Get_table();
		$query = $conteudo->get_custos_variaveis();
		
		$i = 0; //Controlador do loop
		$descricao; $custo;

		foreach ($query->result() as $row) {
			$descricao[$i] = $row->custo;
			$custo[$i] = $row->valor;
      		$i++;
		}

		for ($k = 0; $k < $i; $k++) {
			$resultado[] = array(0 => $descricao[$k], 1 => $custo[$k]);
		}

		return $resultado;
	}

		public function trata_dados_custos_fixos() {
		$conteudo = new Get_table();
		$query = $conteudo->get_custos_fixos();
		
		$posicao = $this->busca_campo_vendas('Margem de contribuição R$');
		$venda = $this->trata_dados_vendas();

		$i = 0; //Controlador do loop
		$descricao; $custo;
		
		foreach ($query->result() as $row) {
			$descricao[$i] = $row->custo;
			$custo[$i] = $row->valor;
      		$i++;
		}

		for ($k = 0; $k < $i; $k++) {
			if ($descricao[$k] == 'Margem de contribuição total') {
				$resultado[] = array(0 => $descricao[$k], 1 => $venda[$posicao][2]);

			} else if($descricao[$k] == 'Lucro ou prejuízo total') {
				$campo_1 = $this->busca_campo_custos_fixos('Salário');
				$campo_2 = $this->busca_campo_custos_fixos('Hospedagem');
				$resultado[] = array (0 => $descricao[$k], 1 => $venda[$posicao][2] - $this->soma_valores($campo_1, $campo_2, $custo));
			} else {
				$resultado[] = array(0 => $descricao[$k], 1 => $custo[$k]);	
			}
			
		}

		return $resultado;
	}

	private function trata_dados_vendas() {
		$conteudo = new Get_table();
		$query = $conteudo->get_vendas();
		$i = 0; //Controlador do loop
		$descricao; $valor_unit; $estoque; $vendas; //variáveis auxiliares

		foreach ($query->result() as $row) {
			$descricao[$i] = $row->descricao;
			$valor_unit[$i] = $row->valor_unit;
      		$i++;
		}
		
		$estoque = $this->gera_estoque($descricao, $valor_unit);
		$vendas  = $this->gera_vendas($descricao, $valor_unit);

		for ($k = 0; $k < $i; $k++) {
			$resultado[] = array(0 => $descricao[$k], 1 => $valor_unit[$k], 2 => $estoque[$k], 3 => $vendas[$k]);
		}
		return $resultado;
	}

	private function trata_dados_vendas_data() {
		$conteudo = new Get_table();
		$query = $conteudo->get_vendas_mensais();
		$i = 0; //Controlador do loop
		$data; $valor; //variáveis auxiliares

		foreach ($query->result() as $row) {
			$data[$i] = $row->data;
			$valor[$i] = $row->valor;
      		$i++;
		}

		for ($k = 0; $k < $i; $k++) {
			$resultado[] = array(0 => $data[$k], 1 => $valor[$k]);
		}
		return $resultado;
	}

	private function get_produto() {
		$conteudo = new Get_table();
		$produto = array();
		foreach ($conteudo->get_produto() as $row) {
	        $produto = array(0 => $row->id, 1 => $row->nome, 2 => $row->quantidade);
		}
		return $produto;
	}


	private function get_total_vendas() {
		$conteudo = new Get_table();
		$query = $conteudo->get_vendas_mensais();
		$total = 0;

		foreach ($query->result() as $row) {
			$total += $row->valor;
		}
		return $total;
	}

	private function gera_estoque($descricao ,$valor_unit) {
		for ($i = 0; $i < sizeof($valor_unit); $i++) {
			if ($descricao[$i] == 'Quantidade de itens') {
				$campo = $this->busca_campo_vendas('Perda de itens');
				$estoque[$i] = $this->get_produto()[2] - ($this->get_total_vendas()) - ($valor_unit[$campo]); 
			
			} else if($descricao[$i] == 'Perda de itens') {
				$estoque[$i] = NULL;
			
			} else if($descricao[$i] == 'Valor de perda') {
				$campo = $this->busca_campo_vendas('Perda de itens');
				$campo_2 = $this->busca_campo_vendas('Preço de compra/produção');
				$estoque[$i] = $valor_unit[$campo] * $valor_unit[$campo_2];
			
			} else if ($descricao[$i] == 'CPMF') {
				$campo = $this->busca_campo_vendas('Preço de venda');
				$estoque[$i] = 0; //A fazer custos
			
			} else if ($descricao[$i] == 'Desconto a cliente') {
				$estoque[$i] = NULL;
			
			} else if ($descricao[$i] == 'Margem de contribuição R$') {
				$campo = $this->busca_campo_vendas('Preço de venda');
				$campo_2 = $this->busca_campo_vendas('Crédito ICMS');
				$campo_3 = $this->busca_campo_vendas('Preço de compra/produção');
				$campo_4 = $this->busca_campo_vendas('SIMPLES NACIONAL');
				
				$estoque[$i] = ($estoque[$campo] + $estoque[$campo_2]) - ($this->soma_valores($campo_3, $campo_4, $estoque));
			
			} else if ($descricao[$i] == '% Margem de contribuição') {
				$campo = $this->busca_campo_vendas('Margem de contribuição R$');
				$campo_2 = $this->busca_campo_vendas('Preço de venda');
				$estoque[$i] = $estoque[$campo] / $estoque[$campo_2];
			
			} else if ($descricao[$i] == 'Custo financeiro mensal') {
				$estoque[$i] = NULL;
			
			} else {
				$estoque[$i] = $estoque[0] * $valor_unit[$i];
			}
			
		} 
		return $estoque;
	}

	private function gera_vendas($descricao, $valor_unit) {
		for ($i = 0; $i < sizeof($valor_unit); $i++) {
			if ($descricao[$i] == 'Quantidade de itens') {
				$vendas[$i] = $this->get_total_vendas(); 
			
			} else if ($descricao[$i] == 'Perda de itens') {
				$vendas[$i] = NULL;

			
			} else if($descricao[$i] == 'Valor de perda') {
				$vendas[$i] = NULL;
			
			} else if ($descricao[$i] == 'CPMF') {
				$campo = $this->busca_campo_vendas('Preço de venda');
				$vendas[$i] = 0; //A fazer custos
			
			} else if ($descricao[$i] == 'Desconto a cliente') {
				$vendas[$i] = NULL;
			
			} else if ($descricao[$i] == 'Margem de contribuição R$') {
				$campo = $this->busca_campo_vendas('Preço de venda');
				$campo_2 = $this->busca_campo_vendas('Crédito ICMS');
				$campo_3 = $this->busca_campo_vendas('Preço de compra/produção');
				$campo_4 = $this->busca_campo_vendas('SIMPLES NACIONAL');
				
				$vendas[$i] = ($vendas[$campo] + $vendas[$campo_2]) - ($this->soma_valores($campo_3, $campo_4, $vendas));
			
			} else if ($descricao[$i] == '% Margem de contribuição') {
				$campo = $this->busca_campo_vendas('Margem de contribuição R$');
				$campo_2 = $this->busca_campo_vendas('Preço de venda');
				$vendas[$i] = $vendas[$campo] / $vendas[$campo_2];
			
			} else if ($descricao[$i] == 'Custo financeiro mensal') {
				$vendas[$i] = NULL;
			
			} else {
				$vendas[$i] = $vendas[0] * $valor_unit[$i];
			}
			
		} 
		return $vendas;
	}

	private function busca_campo_vendas($descricao) {
		$conteudo = new Get_table();
		$i = 0;
		$query = $conteudo->get_vendas();
		foreach ($query->result() as $row) {
			if ($descricao == $row->descricao) {
				break;
			}
			$i++;
		}
		return $i;
	}

	private function busca_campo_custos_fixos($descricao) {
		$conteudo = new Get_table();
		$i = 0;
		$query = $conteudo->get_custos_fixos();
		foreach ($query->result() as $row) {
			if ($descricao == $row->custo) {
				break;
			}
			$i++;
		}
		return $i;
	}

	private function soma_valores($pos_1, $pos_2, $valor) {
		$soma = 0;
		for ($i = $pos_1; $i <= $pos_2; $i++) {
			if (isset($valor[$i])) {
				$soma += $valor[$i];
			}	
		}
		return $soma;
	}
}