<?php

    $dsn      = "mysql:host=localhost;dbname=xudemy_php_pdo";
    $user     = "root";
    $password = "";

    try {
        $Conn = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo "
        <div style='color: #FEEAEA; background: #d12121; border:1px solid #7C1515; padding: 10px; font-family: Calibri, sans-serif; border-radius: 5px;'>
            <strong>Erro:</strong> {$e->getMessage()} |
            <strong>Arquivo:</strong> {$e->getFile()} |
            <strong>Linha:</strong> {$e->getLine()} |
            <strong>Código:</strong> {$e->getCode()}
        </div>    
        ";
    }

    // var_dump($Conn);