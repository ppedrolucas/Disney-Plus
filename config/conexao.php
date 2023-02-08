<?php

try{
    DEFINE('HOST', 'localhost');
    DEFINE('DB', 'bd_disney');
    DEFINE('USER', 'root');
    DEFINE('PASS', '');

    $conect = new PDO('mysql:host='.HOST.';dbname='.DB,USER,PASS);
    $conect -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "<p>ERRO DE PDO = </p>".$e->getMessage();
}