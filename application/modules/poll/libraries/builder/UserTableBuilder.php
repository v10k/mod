<?php
include_once APPPATH.'libraries/builder/TableBuilder.php';

class UserTableBuilder extends TableBuilder{

   function __construct(){
      parent::__construct('mod_poll_user');
   }

    function get_fields(){
        return  array(
                    'nome' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '30'
                    ),
                    'gu' => array(
                        'type' => 'INT',
                        'constraint' => 5
                    )
                );
   }
/*
   function get_data(){
      return array(
         array(
            'nome' => 'Mariana da Silva', 
            'gu' => '4444'
         ),
         array(
            'nome' => 'Julia Roberts', 
            'gu' => '1111'
         ),
      );
   }*/
}