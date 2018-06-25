<?php

abstract class TestDataBuilder{

    private $db;
    private $table;

    function __construct($table){
        $this->table = $table;
        $ci = & get_instance();
        $this->db = $ci->db;
    }

    /**
     * Prepara o banco de dados para teste.
     */
    public function build(){
        $data = $this->getData();
        
        foreach ($data AS $livro)
            $this->db->insert($this->table, $livro);
    }

    /**
     * Limpa o banco de dados que está em teste
     */
    public function flush(){
        $sql = "TRUNCATE $this->table";
        $this->db->query($sql);
    }

    /**
     * Informa quais são os dados de teste
     * 
     * @return matriz: dados de teste
     */
    protected abstract function getData();

}