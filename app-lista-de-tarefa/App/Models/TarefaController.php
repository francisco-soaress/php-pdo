<?php

require "Tarefas.class.php";
require "TarefasService.class.php";
require "Conexao.class.php";

$acao = isset($_GET["acao"]) ? $_GET["acao"] : $acao;

if($acao == "inserir"){
    $Tarefa = new Tarefas();
    $Tarefa->__set("tarefa", $_POST["tarefa"]);

    $Conexao = new Conexao();

    $TarefaService = new TarefaService($Conexao, $Tarefa);
    $TarefaService->inserir();

    header("Location: nova_tarefa.php?inclusao=1");

} elseif($acao == "recuperar"){
    
    $Tarefa = new Tarefas();
    $Conexao = new Conexao();

    $TarefaService = new TarefaService($Conexao, $Tarefa);
    $tarefasRetorno = $TarefaService->recuperar();

} elseif($acao == "atualizar"){
    $Tarefa = new Tarefas();
    $Tarefa->__set("id", $_POST["id"]);
    $Tarefa->__set("tarefa", $_POST["tarefa"]);

    //$Tarefa->__set("id", $_POST["id"])->__set("tarefa", $_POST["tarefa"])
    //EXPLICAÇÃO no arquivo: Tarefas.class.php

    $Conexao = new Conexao();

    $TarefaService = new TarefaService($Conexao, $Tarefa);
    if($TarefaService->atualizar()){
        header("location: todas_tarefas.php?update=1");
    }
}elseif($acao == "remover"){
    $Tarefa = new Tarefas();
    $Tarefa->__set("id", $_GET['id']);

    $Conexao = new Conexao();

    $TarefaService = new TarefaService($Conexao, $Tarefa);
    $TarefaService->remover();

    header("location: todas_tarefas.php");

}elseif($acao == "realizada"){
    $Tarefa = new Tarefas();
    $Tarefa->__set("id", $_GET["id"]);
    $Tarefa->__set("id_status", 2);

    $Conexao = new Conexao();

    $TarefaService = new TarefaService($Conexao, $Tarefa);
    $TarefaService->marcarRealizada();

    header("location: todas_tarefas.php");
}
