<?php
include_once APPPATH.'libraries/util/CI_Object.php';

abstract class TableBuilder extends CI_Object{

   private $table;
   protected $dbforge;
   private $log_change_time;

   function __construct($table, $log_change_time = false){
      parent::__construct();
      $this->loadDBForge();
      $this->table = $table;
   }

   private function loadDBForge(){
      $this->load->dbforge();
      $this->dbforge = $this->ci->dbforge;
   }

   public function build(){
      $this->db->db_debug = FALSE;
      $this->dbforge->add_field('id');
      $this->dbforge->add_field($this->get_fields());
      $this->add_common_fields();

      $this->dbforge->create_table($this->table);
      $this->init_data();
      
      $this->db->db_debug = TRUE;
      $x = $this->db->error();
      $x['table'] = $this->table;
      return $x;
   }

   public function reset(){
    $this->db->db_debug = FALSE;
    $this->dbforge->drop_table($this->table, TRUE);
    $this->db->db_debug = TRUE;
    $x = $this->db->error();
    $x['table'] = $this->table;
    $x['last_query'] = $this->db->last_query();
    return $x;
   }
   
   private function init_data(){
      $m = $this->get_data();
        foreach($m AS $row)
          $this->db->insert($this->table, $row);
   }

   private function add_common_fields(){
      $cpl = $this->log_change_time ? ' on update CURRENT_TIMESTAMP' : '';
      $this->dbforge->add_field("deleted TINYINT NOT NULL DEFAULT '0'");
      $this->dbforge->add_field("last_modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP $cpl");
   }

   protected function get_data(){
      return array();
   }

   protected abstract function get_fields();

}

/*
 * The following key/values can be used:
 *
 * unsigned/true: to generate “UNSIGNED” in the field definition.
 * default/value: to generate a default value in the field definition.
 * null/true: to generate “NULL” in the field definition. Without this, the field will default to “NOT NULL”.
 * auto_increment/true: generates an auto_increment flag on the field. Note that the field type must be integer.
 * unique/true: to generate a unique key for the field definition.
 */