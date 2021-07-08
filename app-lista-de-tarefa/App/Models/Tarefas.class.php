<?php 
class Tarefas {
    private $id;
    private $id_status;
    private $tarefa;
    private $data_cadastro;

    public function __get($attr){
        return $this->$attr;
    }

    public function __set($attr, $value){
        $this->$attr = $value;
        // return $this - Retorna o valor e posso implementar diferente no locar que o estancia, veja o exemplo no arquivo: TerefaController.php
    }

}
