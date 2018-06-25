<?php
include_once APPPATH.'libraries/builder/TableBuilder.php';

class VoteTableBuilder extends TableBuilder{

   function __construct(){
      parent::__construct('mod_poll_vote');
   }

   function get_fields(){
      return $fields = array(
                'user_id' => array(
                    'type' => 'INT',
                    'constraint' => 9
                ),
                'choice_id' => array(
                    'type' => 'INT',
                    'constraint' => 9
                ),
                'grade' => array(
                    'type' => 'INT',
                    'constraint' => 2
                )
            );
   }

   // aqui, get_data não faz sentido, pois as notas
   // serão geradas pelo usuário no momento do voto
}