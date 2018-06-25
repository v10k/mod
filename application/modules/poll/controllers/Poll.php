<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Poll extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('PollModel', 'poll');
        $this->menu_itens = $this->model->get_menu_itens();
    }

    // obrigatório
    public function index(){
        $this->poll->register_user();
        $html = $this->load->view('register_form', null, true);
        $this->show($html);
    }

    public function vote(){
        $this->add_script('poll');
        $this->add_style('slider');

        $this->poll->register_vote();
        $data['user'] = $this->session->user;
        $data['cards'] = $this->poll->register_vote();

        $html = $this->load->view('votation_form', $data, true);
        $this->show($html);
    }

    public function result(){
        $this->add_script('result_chart');
        
        $data['results'] = $this->model->get_results();
        $html = $this->load->view('result_chart', $data, true);
        $this->show($html);
    }

}