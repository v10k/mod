<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Run extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('RunModel', 'model');
        // $this->menu_itens = $this->model->get_menu_itens();
    }

    public function usage(){
        // página de orientações sobre o uso do módulo
    }
}