<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/builder/TableBuilder.php';

class CustosFixosTableBuilder extends TableBuilder{

    public function __construct(){
        parent::__construct('mod_preco_custosFixos');
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
            'custo' => 'Margem de contribuição total',  
            'valor' => 0
            ),
            array(
            'custo' => 'Salário',  
            'valor' => 788
            ),
            array(
            'custo' => 'Retirada do proprietário sócio',  
            'valor' => 1500
            ),
            array(
            'custo' => 'FGTS',  
            'valor' => 63.04
            ),
            array(
            'custo' => 'INSS',  
            'valor' => 23.64
            ),
            array(
            'custo' => 'Aluguel',  
            'valor' => 0
            ),
            array(
            'custo' => 'Luz',  
            'valor' => 100
            ),
            array(
            'custo' => 'Telefone',  
            'valor' => 100
            ),
            array(
            'custo' => 'Água',  
            'valor' => 50
            ), 
            array(
            'custo' => 'Gás/Combustível',  
            'valor' => 0
            ),
            array(
            'custo' => 'Propaganda - cartão e folheto',  
            'valor' => 0
            ), 
            array(
            'custo' => 'Veículo',  
            'valor' => 0
            ),
            array(
            'custo' => 'Passagens',  
            'valor' => 0
            ),
            array(
            'custo' => 'Hospedagem',  
            'valor' => 0
            ),
            array(
            'custo' => 'Lucro ou prejuízo total',  
            'valor' => 0
            ),
        );

    }

}