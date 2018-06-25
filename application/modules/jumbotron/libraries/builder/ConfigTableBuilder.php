<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/builder/ConfigBuilder.php';

class ConfigTableBuilder extends ConfigBuilder{

    function __construct(){
        parent::__construct('jumbotron');
    }

    function get_data(){
        $base = parent::get_data();

        $data = array(
            array(
                'nome' => $this->prefix.'centered_text', 
                'valor' => true,
                'descricao' => 'Indica se o jumbotron terá texto centralizado',
                'admin_only' => 0
            ),
            array(
                'nome' => $this->prefix.'image_align', 
                'valor' => 0,
                'descricao' => 'Indica se a imagem fica alinhada à esquerda: 1, à direita: 2 ou centralizada: 0',
                'admin_only' => 0
            )
        );
        return array_merge($base, $data);
    }
}
