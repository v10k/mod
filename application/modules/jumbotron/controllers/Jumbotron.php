<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Jumbotron extends MY_Controller{

    /**
     * Página inicial do módulo; exibe sua funcionalidade principal. Além desta, um
     * módulo pode ter outras páginas, de acordo com sua finalidade. O importante é
     * lembrar que um módulo deve estar focado em fazer, bem feito e de forma flexível, 
     * apenas uma tarefa.
     */
    public function index(){
        $this->load->model('JumbotronModel', 'jumbo');
        $html = $this->jumbo->get_jumbo();
        $this->show($html);
    }

    /**
     * Página de configuração do conteúdo exibido nas páginas de funcionalidades do módulo
     */
    public function edit(){
        $html = 'module pages content editor';
        $this->show($html);
    }


    public function sample(){
        $html = 'apenas um exemplo pra você saber onde colocar as páginas extras';
        $this->show($html);
    }

}