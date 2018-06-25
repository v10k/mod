<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class RunModel extends MY_Model{

    public function __construct(){
        parent::__construct('Mod_Name');
        $this->builder_list[] = 'ConfigTableBuilder';
        $this->builder_list[] = 'MenuTableBuilder';

        // $this->builder_list[] = '...TableBuilder';
    }
    
}