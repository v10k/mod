<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/builder/MenuBuilder.php';


class MenuTableBuilder extends MenuBuilder{

    function __construct(){
        parent::__construct('preco');
    }

    function get_data(){
        // páginas básicas: index e edit
        $base = parent::get_data();

        // páginas extras: funcionalidades adicionais do módulo
        $data = array(
            array(
                'label'  => 'Tabela de Custos', 
                'link'   => $this->mod_name.'/custos',
                'name'   => $this->prefix.'Tabela de Custos',
                'module' => $this->mod_name
            ),
        );

        return array_merge($base, $data);
    }
}
