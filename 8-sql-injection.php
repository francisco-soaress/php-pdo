<?php

if(!empty($_POST["usuario"]) && !empty($_POST["senha"])){

    $dsn      = "mysql:host=localhost;dbname=udemy_php_pdo";
    $user     = "root";
    $password = "";
    $table_user = "tb_usuarios";

    try {
        $Conn = new PDO($dsn, $user, $password);

        /** A forma utilizada abaixo está suscetível a SQL Injection (Injeção de instrução de SQL).
         * No campo senha, eu posso inserir uma instrução para excluir todos os registro do banco
         * Ex: digito a senha entre aspas simples eu insiro 'delete * from <nome-da-tabela> where a=a'
         */

        $querySelect = "select * from {$table_user} WHERE email = '{$_POST["usuario"]}' AND senha = '{$_POST["senha"]}'";

        $getStatement = $Conn->query($querySelect);
        $returnList= $getStatement->fetch(PDO::FETCH_ASSOC);

        var_dump($returnList);
        

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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection</title>
</head>

<body>

    <form action="8-sql-injection.php" method="POST">
        <label for=""><input type="text" name="usuario" placeholder="Informe seu login"></label><br><br>
        <label for=""><input type="password" name="senha" placeholder="Informe sua senha"></label><br><br>
        <button type="submit">Fazer meu login</button>
    </form>

</body>

</html>