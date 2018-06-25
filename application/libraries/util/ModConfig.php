<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModConfig{

    private $db;
    private $data;

    public function __construct(){
        $ci = & get_instance();
        $this->db = $ci->db;
        if($ci->db->table_exists('config') ){
            $rs = $ci->db->get('config');
            $this->set_data($rs->result());
        }
    }

    private function set_data($data){
        $this->data = $data;

	    foreach ($data as $row){
            $this->{$row->nome} = $row->valor;
            $this->{$row->nome.'_descr'} = $row->descricao;
        }
    }

    public function update($itens){
        foreach ($itens as $key => $val) {
            $item = array('nome' => $key, 'valor' => $val);
            $this->insert_or_update('config', $item);
        }
    }

    public function get_data($prefix = ''){
        $this->db->like('nome', $prefix);
        $rs = $this->db->get('config');
        return $rs->result();
    }

    public function set($nome, $valor){
        $item = array('nome' => $nome, 'valor' => $valor);
        $this->insert_or_update('config', $item);
    }

    /**
	 * Insere data em table; caso data ja exista em table, atualiza os pares
	 * nome/valor contidos em updt.
	 *
	 * @param String $table - o nome da tabela a ser atualizada
	 * @param Array $data - os dados a serem inseridos ou atualizados na tabela table
	 * @param int id do registro inserido
	 */
	private function insert_or_update($table, $data) {
		$updt = plic_array($data);
		$sql = $this->db->insert_string($table, $data) .
		' ON DUPLICATE KEY UPDATE id=LAST_INSERT_ID(id), '
		.urldecode(http_build_query($updt, '', ', '));
		$this->db->query($sql);
		return $this->db->insert_id();
	}
}