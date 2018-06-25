<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'modules/poll/libraries/component/ConfigItem.php';
include_once APPPATH . 'libraries/component/InstallStatus.php';
include_once APPPATH . 'libraries/component/MenuItem.php';

class MY_Model extends CI_Model{

    protected $builder_list;
    protected $mod_status; 
    protected $mod_name;

    public function __construct($mod_name = ''){
        $this->mod_name = $mod_name;
        $this->mod_status = 'mod_'.strtolower($mod_name).'_active';
    }
    
    protected function status_list($data, $reset = false){
        $html = '';

        foreach ($data as $result) {
            $status = new InstallStatus($result, $reset);
            $html .= $status->getHTML();
        }
        return $html;
    }

    protected function db_error_msg($msg){
        $data = array('code'=> 1, 'message'=>$msg);
        $status = new InstallStatus($data);
        return $status->getHTML();
    }

    public function install(){
        $data = array();

        if(! isset($this->modconfig->{$this->mod_status}))
            return $this->execute('build');            
        else return $this->db_error_msg('O módulo '.$this->mod_name.' já está instalado');
    }

    public function reset(){
        $data = array();

        if(isset($this->modconfig->{$this->mod_status}))
            return $this->execute('reset');            
        else return $this->db_error_msg('O módulo '.$this->mod_name.' não está instalado');
    }

    private function execute($action){
        if(! isset($this->builder_list)) return;
        foreach ($this->builder_list as $builder) {
            $this->load->library("builder/$builder", '', 'model');
            $data[] = $this->model->$action();
       }
       return $this->status_list($data, strcmp($action, 'reset') == 0);
    }

    public function get_menu_itens(){
        $html = '';
        $mod_name = $this->uri->segment(1);
        $this->load->library('util/MenuData', '', 'menu');
        $data =  $this->menu->get_itens($mod_name);

        foreach ($data AS $item) {
            $menu_item = new MenuItem($item);
            $html .= $menu_item->getHTML(); 
        }
        return $html;
    }

    public function config($is_admin = false){
        $item_list = $this->config_itens_list();
        if(! sizeof($_POST)) return $item_list;

        $itens = $this->input->post('config');
        $this->modconfig->update($itens);
        $item_list = $this->config_itens_list();
        redirect($this->uri->uri_string());
        
        return $item_list; // colocar uma success_page
    }

    
    public function config_itens_list(){
        $html = '';
        $data = $this->modconfig->get_data('mod_'.$this->mod_name);

        foreach ($data as $row) {
            $item = new ConfigItem($row);
            $html .= $item->getHTML();
        }
        return $html;
    }
}