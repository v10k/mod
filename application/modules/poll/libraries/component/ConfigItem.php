<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConfigItem{

    private $id;
    private $nome;
    private $valor;
    private $descricao;

    public function __construct($data){
        $this->id = $data->id;
        $this->nome = $data->nome;
        $this->valor = $data->valor;
        $this->descricao = $data->descricao;
    }

    public function getHTML(){
        $html = '
        <div class="row">
            <div class="col-sm-7"><p class="alert alert-info">'.$this->nome.
            '<br><small>'.$this->descricao.'</small></p></div>
            <div class="col-sm-5">
                <div class="md-form mt-0">
                    <input type="text" class="form-control" name="config['.$this->nome.']" value="'.$this->valor.'">
                </div>
            </div>
        </div>';
        return $html;
    }

}