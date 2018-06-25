<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';

class VotationChoice extends CI_Object{

   public function __construct(){
      parent::__construct();
   }

   public function get_all(){
      $rs = $this->db->get_where('mod_poll_choice', array('deleted' => 0));
      return $rs->result();
   }
}