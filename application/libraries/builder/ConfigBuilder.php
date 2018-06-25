<?php 
include_once  'TableBuilder.php';

abstract class ConfigBuilder extends TableBuilder{

    protected $prefix;

    public function __construct($mod_name){
        parent::__construct('config');
        $this->prefix = 'mod_'.$mod_name.'_';
    }

    function get_fields(){
        return $fields = array(
            'nome' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
                'unique' => true
            ),
            'valor' => array(
                'type' => 'VARCHAR',
                'constraint' => 150
            ),
            'descricao' => array(
                'type' => 'VARCHAR',
                'constraint' => 250
            ),
            'admin_only' => array(
                'type' => 'INT',
                'constraint' => 2
            )
        );
    }

    function get_data(){
        return array(
            array(
                'nome' => $this->prefix.'active', 
                'valor' => 1,
                'descricao' => 'Indica se um módulo está habilitado ou não',
                'admin_only' => 1
            )
        );
    }

}