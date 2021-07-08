<?php

    $dsn      = "mysql:host=localhost;dbname=udemy_php_pdo";
    $user     = "root";
    $password = "";
    $table_user = "tb_usuarios";

    try {
        $Conn = new PDO($dsn, $user, $password);

        /* ==== CREATE TABLE ==== */
        $query = "
            create table {$table_user}(
                id int not null primary key auto_increment,
                nome varchar(50) not null,
                email varchar(100) not null,
                senha varchar(32) not null
            )
        ";

        $return = $Conn->exec($query);

        if($return == 0){
        echo "
            <div style='color: #EBFDF0; background: #26D84F; border:1px solid #35BA54; padding: 10px; font-family: Calibri, sans-serif; border-radius: 5px;'>
                Tabela <strong>{$table_user}</strong> foi criada com sucesso.
            </div>    
        ";
        }else{
        echo "
            <div style='color: #FEEAEA; background: #d12121; border:1px solid #7C1515; padding: 10px; font-family: Calibri, sans-serif; border-radius: 5px;'>
                A Tabela <strong>{$table_user}</strong> não foi criada.
            </div>    
        ";
        }
        /* ==== CREATE TABLE ==== */

        /* ==== INSERT ON THE TABLE ==== */
        // $query_insert = "
        //     insert into {$table_user} (
        //         nome, email, senha
        //     ) values (
        //         'Homer Simpsons', 'homer@webfr.com.br', '123456'
        //     )
        // ";

        // $return_insert = $Conn->exec($query_insert);

        // if ($return_insert == 1) {
        // echo "
        //     <div style='color: #EBFDF0; background: #26D84F; border:1px solid #35BA54; padding: 10px; font-family: Calibri, sans-serif; border-radius: 5px;'>
        //         Cadastro realizado com sucesso na tabela: <strong>{$table_user}</strong>.
        //     </div>    
        // ";
        // } else {
        // echo "
        //     <div style='color: #FEEAEA; background: #d12121; border:1px solid #7C1515; padding: 10px; font-family: Calibri, sans-serif; border-radius: 5px;'>
        //         Não foi possível realizado o cadastro na tabela: <strong>{$table_user}</strong>.
        //     </div>    
        // ";
        // }
        /* ==== INSERT ON THE TABLE ==== */

        /* ==== DELETE ON THE TABLE ==== */
        $query_delete = "
            delete from {$table_user} WHERE ID = 4
        ";
        
        $return_delete = $Conn->exec($query_delete);

        if ($return_delete >= 1) {
        echo "
            <div style='color: #EBFDF0; background: #26D84F; border:1px solid #35BA54; padding: 10px; font-family: Calibri, sans-serif; border-radius: 5px;'>
                Usuário excluido com sucesso na tabela: <strong>{$table_user}</strong>.
            </div>    
        ";
        } else {
        echo "
            <div style='color: #FEEAEA; background: #d12121; border:1px solid #7C1515; padding: 10px; font-family: Calibri, sans-serif; border-radius: 5px;'>
                Não foi possível realizado a exclusão do usuário na tabela: <strong>{$table_user}</strong>.
            </div>    
        ";
        }
        

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