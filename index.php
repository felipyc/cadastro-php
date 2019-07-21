<?php
    
    /*
        MOSTRA USUÁRIOS CADASTRADOS
    */ 

    require "class/usuarios.class.php";
    require "conecta.php";
    $usuarios = new Usuarios($pdo);
    $filtro = 1;//utilizado no select para ordenar
    if( !empty($_GET['filtro']) ){
        $filtro = $_GET['filtro'];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Sattra colaboradores</title>
  </head>
  <body>
    <div class="container my-5">
        <hr>
            <a href="cadastrar.php">Adicionar novos colaboradores</a> 
        <hr>
        <form action="">
            Filtrar por
            <select name="filtro" onchange="this.form.submit()">
                <option value="1" <?=($filtro == 1)?'selected':''?> >nome</option>
                <option value="2" <?=($filtro == 2)?'selected':''?> >idade</option>
            </select>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>
        <hr>
        <div style="overflow-x: auto;">
            <!-- tabela que mostra os usuários cadastrados -->
            <table class="table table-striped table-sm mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Excluir/Editar</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>CEP</th>
                        <th>Logradouro</th>
                        <th>Numero</th>
                        <th>Complemento</th>
                        <th>Bairro</th>
                        <th>Localidade</th>
                    </tr>
                </thead>
                <tbody class="table-hover">
                    <?php $c = 1; foreach($usuarios->usuariosCadastrados($filtro) as $usuario): ?>
                        <tr>
                            <th><?=$c++?></th>
                            <td><a href="excluir.php?id=<?=$usuario['id']?>" title="excluir"><i class='far fa-window-close'></i></a> / <a href="editar.php?id=<?=$usuario['id']?>" title="editar"><i class="far fa-edit"></i></a></td>
                            <td><?=$usuario['nome']?></td>
                            <td><?=$usuarios->idadeUsuario($usuario['data_nascimento'])?></td>
                            <td><?=$usuario['cpf']?></td>
                            <td><?=$usuario['telefone']?></td>
                            <td><?=$usuario['email']?></td>
                            <td><?=$usuario['cep']?></td>
                            <td><?=$usuario['logradouro']?></td>
                            <td><?=$usuario['numero']?></td>
                            <td><?=$usuario['complemento']?></td>
                            <td><?=$usuario['bairro']?></td>
                            <td><?=$usuario['localidade']?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
    
    

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>