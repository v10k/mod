<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';

class Insere extends CI_Object{

   public function __construct(){
      parent::__construct();
   }

   public function cadastra($data, $num) {
   	$dados = array('data' => $data,'valor' => $num );
   	$this->db->insert('mod_preco_mensal', $dados); 
   	echo "inserido com sucesso";
   }

}