<?php

class Conexao {

    private $host   = "localhost";
    private $dbname = "udemy_php_pdo";
    private $user   = "root";
    private $pass   = "";

    public function conectar(){
        try{
            
            $conexao = new PDO("mysql:host={$this->host};dbname={$this->dbname};", "{$this->user}", "{$this->pass}");
            return $conexao;

        }catch(PDOException $e){
            echo "
            <div style='color: #FEEAEA; background: #d12121; border:1px solid #7C1515; padding: 10px; font-family: Calibri, sans-serif; border-radius: 5px;'>
                <strong>Erro:</strong> {$e->getMessage()} |
                <strong>Arquivo:</strong> {$e->getFile()} |
                <strong>Linha:</strong> {$e->getLine()} |
                <strong>Código:</strong> {$e->getCode()}
            </div>    
            ";
        }
    }
}