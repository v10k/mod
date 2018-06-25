<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH.'modules/jumbotron/libraries/component/jumbo/JumboData.php';
include_once APPPATH.'modules/jumbotron/libraries/component/jumbo/JumboComponent.php';


class JumbotronModel extends MY_Model{

    public function get_jumbo(){
        $data = new JumboData(1);
        $jumb = new JumboComponent($data);
        return $jumb->getHTML();
    }

}