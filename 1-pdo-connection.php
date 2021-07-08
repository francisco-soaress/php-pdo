<?php

    $dsn      = "mysql:host=localhost;dbname=udemy_php_pdo";
    $user     = "root";
    $password = "";

    $Conn = new PDO($dsn, $user, $password);

    var_dump($Conn);