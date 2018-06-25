<?php 
include_once  'TableBuilder.php';

abstract class MenuBuilder extends TableBuilder{
    protected $mod_name;
    protected $prefix;

    public function __construct($mod_name){
        parent::__construct('menu');
        $this->mod_name = $mod_name;
        $this->prefix = 'mod_'.$mod_name.'_';
    }

    function get_fields(){
        return $fields = array(
            'label' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
                'unique' => true
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
                'unique' => true
            ),
            'link' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
            ),
            'icon' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
            ),
            'context' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 1
            ),
            'parent' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'root'
            ),
            'menu_order' => array(
                'type' => 'INT',
                'constraint' => 4,
                'default' => 0
            ),
            'disabled' => array(
                'type' => 'INT',
                'constraint' => 4,
                'default' => 0
            ),
            'module' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => true
            )
        );
    }

    // páginas básicas: index e edit
    function get_data(){
        return array(
            array(
                'label'  => 'Início', 
                'link'   => $this->mod_name,
                'name'   => $this->prefix.'index',
                'module' => $this->mod_name
            ),
            array(
                'label'  => 'Editar', 
                'link'   => $this->mod_name.'/edit',
                'name'   => $this->prefix.'edit',
                'module' => $this->mod_name
            ),
            array(
                'label'  => 'Como Usar', 
                'link'   => $this->mod_name.'/run/usage',
                'name'   => $this->prefix.'usage',
                'module' => $this->mod_name
            )
        );
    }

}