<?php

class RunModel extends MY_Model{

    public function __construct(){
        parent::__construct('Poll');
        $this->builder_list[] = 'ConfigTableBuilder';
        $this->builder_list[] = 'MenuTableBuilder';

        $this->builder_list[] = 'ChoiceTableBuilder';
        $this->builder_list[] = 'UserTableBuilder';
        $this->builder_list[] = 'VoteTableBuilder';
    }

}