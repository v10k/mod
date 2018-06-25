<?php
include_once APPPATH.'libraries/builder/TableBuilder.php';

class ChoiceTableBuilder extends TableBuilder{

   function __construct(){
      parent::__construct('mod_poll_choice');
   }

   function get_fields(){
      return $fields = array(
               'img' => array(
                  'type' => 'VARCHAR',
                  'constraint' => 100
               ),
               'title' => array(
                  'type' => 'VARCHAR',
                  'constraint' => 50
               ),
               'description' => array(
                  'type' => 'VARCHAR',
                  'constraint' => 150
               )
            );
   }

   // aqui, get_data não faz sentido, pois as opções sobre 
   // as quais o usuário vai votar devem ser cadastradas
}