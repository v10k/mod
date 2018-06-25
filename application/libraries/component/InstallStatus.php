<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class InstallStatus{

    private $cor, $msg;

    public function __construct(array $data, $reset = false){
        $query = isset($data['last_query']) ? $data['last_query'] : '';
        $cpl = $reset ? ' foi eliminada com sucesso.' : ' foi criada com sucesso.';
        $this->cor = $data['code'] ? 'danger' : 'info';
        $this->msg = $data['code'] ? $data['message'].'<br><br>'.$query : 
             'A tabela '.$data['table'].$cpl;
    }

    public function getHTML(){
        return '<p class="alert alert-'.$this->cor.'">'.$this->msg.'</p>';
    }

}