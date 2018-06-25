<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Preco extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('PrecoModel', 'preco');
        $this->menu_itens = $this->preco->get_menu_itens();
        $html = $this->load->view('header', null, true);
        $this->show($html);
    }

    /**
     * Página inicial do módulo; exibe sua funcionalidade principal. Além desta, um
     * módulo pode ter outras páginas, de acordo com sua finalidade. O importante é
     * lembrar que um módulo deve estar focado em fazer, bem feito e de forma flexível, 
     * apenas uma tarefa.
     */
    public function index(){
        $data['tabela_1'] = $this->preco->set_table_vendas();
        $data['tabela_2'] = $this->preco->set_table_data();
        $data['titulo_1'] = 'Vendas';
        $data['titulo_2'] = 'Vendas por data';
        $html = $this->load->view('tabela', $data, true);
        $html .= $this->load->view('footer', null, true);
        $html .= $this->load->view('script', null, true);
        $this->show($html);
    }

    /**
     * Página de configuração do conteúdo exibido nas páginas de funcionalidades do módulo
     */
    public function edit(){
        $this->load->model('FormModel', 'form');
        $data['formulario'] = $this->form->set_form();
        $data['titulo'] = 'Cadastrar venda';
        $html = $this->load->view('formulario', $data, true);
        $html .= $this->load->view('footer', null, true);
        $html .= $this->load->view('script', null, true);
        $this->show($html);
    }

    public function custos() {
        $data['tabela_1'] = $this->preco->set_table_custos_variaveis();
        $data['tabela_2'] = $this->preco->set_table_custos_fixos();
        $data['titulo_1'] = 'Custos variáveis';
        $data['titulo_2'] = 'Custos fixos';
        $html = $this->load->view('tabela', $data, true);
        $html .= $this->load->view('footer', null, true);
        $html .= $this->load->view('script', null, true);
        $this->show($html);
    }

}