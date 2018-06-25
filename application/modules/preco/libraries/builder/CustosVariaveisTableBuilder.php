<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/builder/TableBuilder.php';

class CustosVariaveisTableBuilder extends TableBuilder{

    public function __construct(){
        parent::__construct('mod_preco_custosVariaveis');
    }

    function get_fields(){
        return  array(
                    'custo' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '60'
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
            'custo' => 'Comissão',  
            'valor' => 0
            ),
            array(
            'custo' => 'Débito ICMS',  
            'valor' => 0
            ),
            array(
            'custo' => 'Débito ICMS - Simples - AP',  
            'valor' => 0
            ),
            array(
            'custo' => 'Crédito ICMS',  
            'valor' => 0
            ),
            array(
            'custo' => 'PIS',  
            'valor' => 0
            ),
            array(
            'custo' => 'COFINS',  
            'valor' => 0
            ),  
            array(
            'custo' => 'IRPJ',  
            'valor' => 0
            ),
            array(
            'custo' => 'Contribuição social',  
            'valor' => 0
            ),
            array(
            'custo' => 'Cartão de crédito',  
            'valor' => 0
            ),
            array(
            'custo' => 'Desconto bancário',  
            'valor' => 0
            ),
            array(
            'custo' => 'Débito de IPI',  
            'valor' => 0
            ),
            array(
            'custo' => 'Débito ISS',  
            'valor' => 0
            ),
            array(
            'custo' => 'SIMPLES',  
            'valor' => 0
            ),
            array(
            'custo' => 'CPMF',  
            'valor' => 0
            ),
            array(
            'custo' => 'Frete',  
            'valor' => 0
            ),
        );

    }

}