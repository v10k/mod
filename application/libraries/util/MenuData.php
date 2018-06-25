<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'CI_Object.php';

class MenuData extends CI_Object{

    public function get_itens($module){
        if ($this->db->table_exists('menu') ){
            $rs = $this->db->get_where('menu', array('module' => $module));
            return $rs->result();
        }
        else return array();
    }

}