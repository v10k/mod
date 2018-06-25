<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/builder/TableBuilder.php';

class JumboTableBuilder extends TableBuilder{

    public function __construct(){
        parent::__construct('jumbotron');
    }

    function get_fields(){
        $fields['titulo'] = array('type' => 'VARCHAR', 'constraint' =>  50);
        $fields['subtitulo'] = array('type' => 'VARCHAR', 'constraint' =>  150);
        $fields['conteudo'] = array('type' => 'VARCHAR', 'constraint' =>  500);
        $fields['imagem'] = array('type' => 'VARCHAR', 'constraint' =>  250);

        return $fields;
    }

    function get_data(){
        // para inserir um registro na tabela jumbotron...
        $data[] = array(
            'titulo' => 'First of All', 
            'subtitulo' => 'A jumbo thats not the tron one', 
            'conteudo' => 'The real problem of the world is: people do not care about nothing but themselves; that\'s the problem.',
            'imagem' => 'https://static.tumblr.com/25191a14ce137af97c70d722f680008b/2zybhkf/1Pmnhs66y/tumblr_static_tumblr_static__640.jpg'
        );

        return $data;
    }

}