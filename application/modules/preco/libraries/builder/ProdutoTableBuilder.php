<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/builder/TableBuilder.php';

class ProdutoTableBuilder extends TableBuilder{

    public function __construct(){
        parent::__construct('mod_preco_produto');
    }

    function get_fields(){
        return  array(
                    'nome' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '60'
                    ),
                    'quantidade' => array(
                        'type' => 'INT',
                        'constraint' => 11
                    )
                );
    }

    function get_data(){
        return array( 
            array(
            'nome' => 'Leite',  
            'quantidade' => 2000
            ),
        );

    }

}