<?php
/**
 * Class de CRUD
 */
class TarefaService{

    private $conexao;
    private $tarefa;

    /**
     * Construtor da classe TarefaService - Construtor tipado
     *
     * @param Conexao $conexao = Enviar parametros do tipo Objeto
     * @param Tarefas $tarefa = Enviar parametros do tipo Objeto
     */
    public function __construct(Conexao $conexao, Tarefas $tarefa){
        $this->conexao = $conexao->conectar();
        $this->tarefa = $tarefa;        
    }


    /**
     * Class Create
     *
     * @return void
     */
    public function inserir(){
        $queryInsert = "insert into tb_tarefas(tarefa) values(:tarefa)";
        $InsertPrepare = $this->conexao->prepare($queryInsert);
        $InsertPrepare->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $InsertPrepare->execute();
    }

    /**
     * Class Read
     *
     * @return void
     */
    public function recuperar(){
        $querySelect = "
        Select 
            t.id, s.status, t.tarefa 
        from 
            tb_tarefas as t
            left join tb_status as s on (t.id_status = s.id)";
        $SelectPrepare = $this->conexao->prepare($querySelect);
        $SelectPrepare->execute();
        return $SelectPrepare->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Class Update
     * Responsável por pela lógica de atualizar os registro no DB.
     *
     * @return void
     */
    public function atualizar(){
        $queryUpdate = "update tb_tarefas set tarefa = ? WHERE id = ?";
        $UpdatePrepare = $this->conexao->prepare($queryUpdate);
        //No bindValue eu posso usar numero ou letras, ex: bindValue(1, valor) || bindValue(":apelido", valor)
        $UpdatePrepare->bindValue(1, $this->tarefa->__get("tarefa"));
        $UpdatePrepare->bindValue(2, $this->tarefa->__get("id"));
        return $UpdatePrepare->execute();
    }

    /**
     * Class Delete
     *
     * @return void
     */
    public function remover(){
        $queryRemove = "delete from tb_tarefas WHERE id = :id";
        $RemovePrepare = $this->conexao->prepare($queryRemove);
        $RemovePrepare->bindValue(":id", $this->tarefa->__get('id'));
        return $RemovePrepare->execute();
    }

    /**
     * Metodo Update Check
     * Responsável por pela lógica de atualizar os registro no DB.
     *
     * @return void
     */
    public function marcarRealizada()
    {
        $queryUpdate = "update tb_tarefas set id_status = ? WHERE id = ?";
        $UpdatePrepare = $this->conexao->prepare($queryUpdate);
        //No bindValue eu posso usar numero ou letras, ex: bindValue(1, valor) || bindValue(":apelido", valor)
        $UpdatePrepare->bindValue(1, $this->tarefa->__get("id_status"));
        $UpdatePrepare->bindValue(2, $this->tarefa->__get("id"));
        return $UpdatePrepare->execute();
    }
}