<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/builder/TableBuilder.php';

class MensalTableBuilder extends TableBuilder{

    public function __construct(){
        parent::__construct('mod_preco_mensal');
    }

    function get_fields(){
        return  array(
                    'data' => array(
                        'type' => 'DATE'
                    ),
                    'valor' => array(
                        'type' => 'DECIMAL',
                        'constraint' => '10,2'
                    )
                );
    }

    function get_data(){
        return array( 
            array(
            'data' => '2018-12-15',  
            'valor' => 1000.00
            ),
        );

    }

}