<?php

    $dsn      = "mysql:host=localhost;dbname=udemy_php_pdo";
    $user     = "root";
    $password = "";
    $table_user = "tb_usuarios";

    try {
        $Conn = new PDO($dsn, $user, $password);

        $query_select = "select * from {$table_user} WHERE ID = 1";

        $get_return = $Conn->query($query_select);

        /* O FETCH retorno apenas um unico registro do banco */
        /* O PDO::FETCH_ASSOC retorna o array associativo */
        $user_return = $get_return->fetch(PDO::FETCH_ASSOC);
        
        var_dump($user_return);
        //Forma de recuperar os dados array
        echo $user_return["email"];

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