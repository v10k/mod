<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/builder/MenuBuilder.php';


class MenuTableBuilder extends MenuBuilder{

    function __construct(){
        parent::__construct('mod_name');
    }

    function get_data(){
        // páginas básicas: index e edit
        $base = parent::get_data();

        // páginas extras: funcionalidades adicionais do módulo
        $data = array(
            array(
                'label'  => 'page1', 
                'link'   => $this->mod_name.'/page1_name',
                'name'   => $this->prefix.'page1_name',
                'module' => $this->mod_name
            ),
            array(
                'label'  => 'page2', 
                'link'   => $this->mod_name.'/page2_name',
                'name'   => $this->prefix.'page2_name',
                'module' => $this->mod_name
            )
        );

        return array_merge($base, $data);
    }
}
