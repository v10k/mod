<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';

class User extends CI_Object{

   function __construct(){
      parent::__construct();
   }

   public function register(array $data){
      $this->db->insert('mod_poll_user', $data);
      $id = $this->db->insert_id();
      $rs = $this->db->get_where('mod_poll_user', array('id' => $id));
      return $rs->row();
   }

}