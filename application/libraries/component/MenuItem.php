<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuItem{

    private $item;

    public function __construct($item){
        $this->item = $item;
    }

    public function getHTML(){
        return '<li class="nav-item">
                    <a class="nav-link" href="'.base_url($this->item->link).'">'.$this->item->label.'</a>
                </li>';
    }
}