<?php

    $dsn      = "mysql:host=localhost;dbname=udemy_php_pdo";
    $user     = "root";
    $password = "";
    $table_user = "tb_usuarios";

    try {
        $Conn = new PDO($dsn, $user, $password);

        $query_select = "select * from {$table_user}";

        $get_return = $Conn->query($query_select);
        var_dump($get_return);

        /* O PDO::FETCH_ASSOC retorna o array associativo */
        /* O PDO::FETCH_NUM retorna o array numérico */
        /* O PDO::FETCH_OBJ retorna um objeto de classe */
        $list = $get_return->fetchAll(PDO::FETCH_ASSOC);
        
        var_dump($list);

        //Forma de recuperar os dados via objeto
        // echo $list[1]->nome;

        echo "<hr>";
        //Forma de recuperar os dados array
        echo $list[0]["nome"];

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