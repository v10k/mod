<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'libraries/util/CI_Object.php';


class JumboData extends CI_Object{

    public function __construct($id){
        parent::__construct();
        $this->load_data($id);
    }

    private function load_data($id){
        $rs = $this->db->get_where('jumbotron', array('id' => $id));

        foreach ($rs->row() as $key => $value) {
            $this->$key = $value;
        }

        $this->{'center_text'} = $this->modconfig->mod_jumbotron_centered_text;
        $this->{'image_align'} = $this->modconfig->mod_jumbotron_image_align;
    }
}