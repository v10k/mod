<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';

class Get_table extends CI_Object{

   public function __construct(){
      parent::__construct();
   }

   public function get_vendas() {
		//$this->db->select('id, descricao, valor_unit');
		$query = $this->db->get('mod_preco_vendas');
		return $query;
	}

	public function get_id($tabela, $campo) {
		$this->db->select($campo);
		$this->db->from($tabela);
		$query = $this->db->get();
		return $query;
	}

	public function get_produto() {
		$query = $this->db->get('mod_preco_produto');
		return $query->result();
	}

	public function get_vendas_mensais() {
		$this->db->from('mod_preco_mensal');
		$this->db->order_by("data", "DESC");
		$query = $this->db->get(); 
		return $query;
	}

	public function get_custos_variaveis() {
		$query = $this->db->get('mod_preco_custosvariaveis');
		return $query;
	}

	public function get_custos_fixos() {
		$query = $this->db->get('mod_preco_custosfixos');
		return $query;	
	}

}