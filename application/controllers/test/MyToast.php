<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . '/controllers/test/Toast.php');

class MyToast extends Toast{
	
	function __construct($name) {
		parent::__construct($name);
	}
	
	/**
	 * Esta função recebe o nome de uma tabela
	 * e a remove do bd (PHP doc)
	 * @param unknown $table
	 */
	protected function drop($table){
		$this->db->query("DROP TABLE IF EXISTS $table");
	}
	
	protected function table_exists($table) {
		$sql = "SHOW TABLES LIKE '$table'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	protected function table_has_column($table, $column){
		$sql = "SELECT * FROM information_schema.COLUMNS
				WHERE  TABLE_SCHEMA = '{$this->db->database}'
				AND TABLE_NAME = '$table' AND COLUMN_NAME = '$column'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	protected function table_column_number($table){
		$sql = "SELECT * FROM information_schema.COLUMNS
		WHERE  TABLE_SCHEMA = '{$this->db->database}' AND TABLE_NAME = '$table'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
}