<?php
    
    /*
        DELETA USUÁRIOS CADASTRADOS
    */ 

    require "class/usuarios.class.php";
    require "conecta.php";
    $usuario = new Usuarios($pdo);

    if( !empty($_GET['id']) ){
        $id = $_GET['id'];
        $usuario->excluirUsuario($id);
        
    }
    header("location: index.php");