<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class RunModel extends MY_Model{

    public function __construct(){
        parent::__construct('preco');
        $this->builder_list[] = 'ConfigTableBuilder';
        $this->builder_list[] = 'MenuTableBuilder';
        
        $this->builder_list[] = 'VendasTableBuilder';
        $this->builder_list[] = 'ProdutoTableBuilder';
        $this->builder_list[] = 'CustosVariaveisTableBuilder';
        $this->builder_list[] = 'CustosFixosTableBuilder';
        $this->builder_list[] = 'MensalTableBuilder';
     

        // $this->builder_list[] = '...TableBuilder';
    }
    
}