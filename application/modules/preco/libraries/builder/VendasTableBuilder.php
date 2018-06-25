<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/builder/TableBuilder.php';

class VendasTableBuilder extends TableBuilder{

    public function __construct(){
        parent::__construct('mod_preco_vendas');
    }

    function get_fields(){
        return  array(
                    'descricao' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100'
                    ),
                    'valor_unit' => array(
                        'type' => 'DECIMAL',
                        'constraint' => '10,2'
                    )
                );
    }

    function get_data(){
        return array( 
            array(
            'descricao' => 'Quantidade de itens',  
            'valor_unit' => 1
            ),
            array(
            'descricao' => 'Perda de itens', 
            'valor_unit' => 0 
            ),

            array(
            'descricao' => 'Preço de venda', 
            'valor_unit' => 8 
            ),

            array(
            'descricao' => 'Crédito ICMS', 
            'valor_unit' => 0 
            ),

            array(
            'descricao' => 'Preço de compra/produção', 
            'valor_unit' => 4 
            ),

            array(
            'descricao' => 'Frete', 
            'valor_unit' => 1 
            ),

            array(
            'descricao' => 'Valor de perda', 
            'valor_unit' => 0,
            ),

            array(
            'descricao' => 'Comissão', 
            'valor_unit' => 0
            ),

            array(
            'descricao' => 'Cartão de crédito', 
            'valor_unit' => 0 
            ),

            array(
            'descricao' => 'CPMF', 
            'valor_unit' => 0 
            ),

            array(
            'descricao' => 'Desconto bancário', 
            'valor_unit' => 0
            ),

            array(
            'descricao' => 'Desconto a cliente', 
            'valor_unit' => 0
            ),

            array(
            'descricao' => 'Débito de IPI', 
            'valor_unit' => 0
            ),

            array(
            'descricao' => 'Débito de ICMS', 
            'valor_unit' => 0
            ),

            array(
            'descricao' => 'Débito ISS', 
            'valor_unit' => 0
            ),

            array(
            'descricao' => 'PIS', 
            'valor_unit' => 0
            ),

            array(
            'descricao' => 'COFINS', 
            'valor_unit' => 0
            ),

            array(
            'descricao' => 'IRPJ', 
            'valor_unit' => 0
            ),

            array(
            'descricao' => 'Contribuição social', 
            'valor_unit' => 0
            ),

            array(
            'descricao' => 'SIMPLES NACIONAL', 
            'valor_unit' => 0
            ),

            array(
            'descricao' => 'Margem de contribuição R$', 
            'valor_unit' => 3
            ),

            array(
            'descricao' => '% Margem de contribuição', 
            'valor_unit' => 0.375
            ),

            array(
            'descricao' => 'Custo financeiro mensal', 
            'valor_unit' => 0.03
            ),
        );
    }

}