<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/builder/ConfigBuilder.php';


class ConfigTableBuilder extends ConfigBuilder{

    function __construct(){
        parent::__construct('preco');
    }

    function get_data(){
        // parâmetros básicos de configuração
        $base = parent::get_data();

        // parâmetros específicos de configuração
        $data = array(
            array(
                'nome' => $this->prefix.'exibir', 
                'valor' => true,
                'descricao' => 'Exibe a tabela de vendas mensais',
                'admin_only' => 0
            ),
            array(
                'nome' => $this->prefix.'destacar', 
                'valor' => true,
                'descricao' => 'Destaca os campos que podem ser alterados,realçando-os com uma cor',
                'admin_only' => 0
            ),
            array(
                'nome' => $this->prefix.'reset', 
                'valor' => true,
                'descricao' => 'Permite zerar a tabela',
                'admin_only' => 1
            )
        );
        
        return array_merge($base, $data);
    }
}
