<?php

abstract class CI_Object{

   protected $ci;
   protected $db;
   protected $load;
   protected $modconfig;

   function __construct(){
      $this->ci = & get_instance();
      $this->db = $this->ci->db;
      $this->load = $this->ci->load;
      $this->modconfig = $this->ci->modconfig;
   }

   /**
	 * Insere data em table; caso data ja exista em table, atualiza os pares
	 * nome/valor contidos em updt.
	 *
	 * @param String $table - o nome da tabela a ser atualizada
	 * @param Array $data - os dados a serem inseridos ou atualizados na tabela table
	 * @param int id do registro inserido
	 */
	protected function insert_or_update($table, $data) {
		$updt = plic_array($data);
		$sql = $this->db->insert_string($table, $data) .
		' ON DUPLICATE KEY UPDATE id=LAST_INSERT_ID(id), '
		.urldecode(http_build_query($updt, '', ', '));
		$this->db->query($sql);
		return $this->db->insert_id();
	}
}