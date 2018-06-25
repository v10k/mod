<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/builder/MenuBuilder.php';

class MenuTableBuilder extends MenuBuilder{

    function __construct(){
        parent::__construct('poll');
    }

   function get_data(){
      return array(
        array(
            'label' => 'Vote', 
            'link' => $this->mod_name,
            'name' => 'votar',
            'module' => $this->mod_name
        ),
        array(
            'label' => 'Preview', 
            'link' => $this->mod_name.'/result',
            'name' => 'resultado',
            'module' => $this->mod_name
        )
      );
   }
}
