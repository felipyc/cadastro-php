<?php

    try{

        $hostname = '127.0.0.1';
        $username = 'root';
        $password = '';
        $database = 'cadastro';
        
        $pdo = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    }catch(PDOExecption $e){
        echo "Erro ao conectar ao banco: ".$e->getMessage();
    }