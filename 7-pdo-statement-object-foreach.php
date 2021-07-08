<?php

    $dsn      = "mysql:host=localhost;dbname=udemy_php_pdo";
    $user     = "root";
    $password = "";
    $table_user = "tb_usuarios";

    try {
        $Conn = new PDO($dsn, $user, $password);

        $query_select = "select * from {$table_user}";
        foreach($Conn->query($query_select) as $values){
            echo "
                <div style='color: #777; background: #eee; border:1px solid #ccc; padding: 10px; font-family: Calibri, sans-serif; border-radius: 5px; margin: 10px 0;'>
                <strong>Nome:</strong> {$values['nome']}<br>
                <strong>Email:</strong> {$values['email']}<br>
                <strong>Senha:</strong> {$values['senha']}<br>
            </div> 
                ";
        }

        /* ==== ESSA É UMA FORMA ==== */
        /*
        $get_return = $Conn->query($query_select);
        $list_user = $get_return->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($list_user as $values){
            echo "
            <div style='color: #777; background: #eee; border:1px solid #ccc; padding: 10px; font-family: Calibri, sans-serif; border-radius: 5px; margin: 10px 0;'>
            <strong>Nome:</strong> {$values['nome']}<br>
            <strong>Email:</strong> {$values['email']}<br>
            <strong>Senha:</strong> {$values['senha']}<br>
        </div> 
            ";
        }*/
        

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