<?php
include_once APPPATH.'libraries/builder/ConfigBuilder.php';

class ConfigTableBuilder extends ConfigBuilder{

    function __construct(){
       parent::__construct('poll');
    }

    function get_data(){
        $base = parent::get_data();

        $data = array(
            array(
                'nome' => $this->prefix.'usa_inscricao', 
                'valor' => true,
                'descricao' => 'Indica se a página de inscrição é obrigatória',
                'admin_only' => 0
            ),
            array(
                'nome' => $this->prefix.'votacao_multipla', 
                'valor' => true,
                'descricao' => 'Indica se o usuário pode votar em apenas um ou em vários itens',
                'admin_only' => 0
            ),
            array(
                'nome' => $this->prefix.'tipo_votacao', 
                'valor' => 'grade',
                'descricao' => 'Indica o tipo da votação. Os valores permitidos são: binary, star, grade, range',
                'admin_only' => 0
            ),
            array(
                'nome' => $this->prefix.'exibe_foto', 
                'valor' => 1,
                'descricao' => 'Indica que o usuário deve cadastrar uma foto',
                'admin_only' => 0
            )
        );

        return array_merge($base, $data);
   }
}

// poll_tipo_votacao pode ser: 
// binary, star, grade, range
// binary [0, 1]
// star [0 .. 5]
// grade [0 .. 10]
// range [a .. b] {a, b} reais