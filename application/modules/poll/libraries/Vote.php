<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';

class Vote extends CI_Object{

    public function __construct(){
        parent::__construct();
    }

    public function register($uid, $data){
        $pack = array();
        foreach ($data as $cid => $nota) {
            $pack[] = array('user_id' => $uid, 'choice_id' => $cid, 'grade' => $nota);
        }
        $this->db->insert_batch('mod_poll_vote', $pack);
    }

    /**
     * Obtém a média percentual das notas obtidas pelos candidatos.
     * 
     * @return array: lista de pares choice_id, nota média percentual.
     */
    public function get_results(){
        $sql = 'SELECT title, AVG(grade) * 10 AS grade FROM mod_poll_vote, 
        mod_poll_choice WHERE mod_poll_choice.id = choice_id GROUP BY choice_id';
        $rs = $this->db->query($sql);
        return $rs->result();
    }
}