<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'modules/poll/libraries/component/VotationCard.php';
include_once APPPATH.'modules/poll/libraries/component/GradeEvalStrategy.php';

class PollModel extends MY_Model{

    function __construct(){
        parent::__construct('Poll');
    }

    public function register_user(){
        if(! sizeof($_POST)) { // post vazio, carrega form vazio
            if(! $this->modconfig->mod_poll_usa_inscricao)
                redirect('poll/vote');
            return;
        }

        // todo envio de formulário tem que ser validado
        $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[5]');
        $this->form_validation->set_rules('gu', 'GU', 'required|greater_than[9999]');

        if($this->form_validation->run()){
            $this->load->library('User');
            $data = $this->input->post();
            $user = $this->user->register($data);

            $this->session->user = $user;
            redirect('poll/vote');
        }
    }

    public function register_vote(){
        $card_list = $this->votation_card_list();
        if(! sizeof($_POST)) return $card_list;
        
        $user = $this->session->user;
        $grades = $this->input->post('grade');
        if($this->validate_grades($grades)){
            $this->load->library('Vote');
            $this->vote->register($user->id, $grades);
            redirect('poll/result');
        }
        else return $card_list;
    }

    private function validate_grades($grades){
        foreach ($grades as $id => $nota) {
            $this->form_validation->set_rules("grade[".$id."]", "Nota[".$id."]", "required|is_natural|greater_than[0]|less_than[11]");
        }
        return $this->form_validation->run();
    }

    private function votation_card_list(){
        $this->load->library('VotationChoice', '', 'choice');
        $data = $this->choice->get_all();
        $html = '';

        foreach ($data as $option) {
            $eval = new GradeEvalStrategy($option->id);
            $card = new VotationCard($option, $eval);
            $html .= $card->getHTML();
        }
        return $html;
    }

    public function get_results(){
        $html = '';
        $this->load->library('Vote');
        $data = $this->vote->get_results();

        foreach ($data as $row)
            $html .= '<input type="hidden" class="grade" id="'.$row->title.'" value="'.$row->grade.'">';
        return $html;
    }

    private function validate_config_itens($itens){
        $this->form_validation->set_rules("config[mod_poll_active]", "Config[mod_pol_active]", "required|is_natural|less_than[2]");
        $this->form_validation->set_rules("config[mod_poll_usa_inscricao]", "Config[mod_pol_usa_inscricao]", "required|is_natural|less_than[2]");
        $this->form_validation->set_rules("config[mod_poll_votacao_multipla]", "Config[mod_pol_votacao_multipla]", "required|is_natural|less_than[2]");
        $this->form_validation->set_rules("config[mod_poll_tipo_votacao]", "Config[mod_pol_tipo_votacao]", "required|in_list[binary,star,grade,range]");
        return $this->form_validation->run();
    }

}