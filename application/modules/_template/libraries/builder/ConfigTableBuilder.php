<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/builder/ConfigBuilder.php';


class ConfigTableBuilder extends ConfigBuilder{

    function __construct(){
        parent::__construct('modname');
    }

    function get_data(){
        // parâmetros básicos de configuração
        $base = parent::get_data();

        // parâmetros específicos de configuração
        $data = array(
            array(
                'nome' => $this->prefix.'param_1', 
                'valor' => true,
                'descricao' => 'Indica se ...',
                'admin_only' => 0
            ),
            array(
                'nome' => $this->prefix.'param_2', 
                'valor' => true,
                'descricao' => 'Determina o valor de ...',
                'admin_only' => 0
            ),
            array(
                'nome' => $this->prefix.'param_3', 
                'valor' => 'yes',
                'descricao' => 'Especifica o tipo de ...',
                'admin_only' => 0
            )
        );
        
        return array_merge($base, $data);
    }
}
