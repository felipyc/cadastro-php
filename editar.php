<?php
    
    /*
        EDITA USUÁRIOS
    */ 

    require "class/usuarios.class.php";
    require "conecta.php";
    $usuario = new Usuarios($pdo);
    
    //verifica se os campos não estão vazios
    if( !empty($_GET['id']) AND ($usuario->usuarioEspecifico($_GET['id']) != false) ){
        
        $dados_usuario = $usuario->usuarioEspecifico($_GET['id']);

        //Verifica se os campo não estão vazios
        if( !empty($_POST['nome']) AND !empty($_POST['telefone']) AND !empty($_POST['email']) AND !empty($_POST['cep']) AND !empty($_POST['logradouro']) AND !empty($_POST['numero']) AND !empty($_POST['complemento']) AND !empty($_POST['bairro']) AND !empty($_POST['localidade'])){

            //campos do formulário.
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email  = $_POST['email'];
            $cep  = $_POST['cep'];
            $logradouro = $_POST['logradouro'];
            $numero = $_POST['numero'];
            $complemento = $_POST['complemento'];
            $bairro = $_POST['bairro'];
            $localidade = $_POST['localidade'];

            $usuario->atualizaDadosUsuario($dados_usuario['id'], $nome, $telefone, $email, $cep, $logradouro, $numero, $complemento, $bairro, $localidade);
            header("location: index.php");
            exit;
        }

    }else{
        header("location: index.php");
        exit;
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
    <div class="mx-auto my-5" style="width: 280px;">
        <hr>
        <div class="text-center">
            Editar dados de <?=$dados_usuario['nome']?><br>
        </div>
        <!-- dica ao usuario que vai cadastrar -->
        <hr>
        <div class="text-center">
            Dica de edição:<br>
            Utilize como referência os exemplos que estão dentro dos campos, quando for digitar.
        </div>
        <!-- formulário de cadastro do colaborador -->
        <hr>
        <form method="post">
            <div class="form-group">
                <label for="">Nome</label><br>
                <input type="text" name="nome" value="<?=$dados_usuario['nome']?>" placeholder="Ex: Seu nome completo" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Data de nascimento</label><br>
                <input type="date" value="<?=$dados_usuario['data_nascimento']?>" disabled class="form-control">
            </div>
            <div class="form-group">
                <label for="">CPF</label><br>
                <input type="number" value="<?=$dados_usuario['cpf']?>" disabled placeholder="Ex: 075507325870" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Telefone</label><br>
                <input type="number" name="telefone" value="<?=$dados_usuario['telefone']?>" placeholder="Ex: 47992432514" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">E-mail</label><br>
                <input type="email" name="email" value="<?=$dados_usuario['email']?>" placeholder="Ex: meuemail@email.com" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">CEP</label><br>
                <input type="number" name="cep" value="<?=$dados_usuario['cep']?>" placeholder="Ex: 88523425" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Logradouro</label><br>
                <input type="text" name="logradouro" value="<?=$dados_usuario['logradouro']?>" placeholder="Ex: joão bonifacio" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Numero</label><br>
                <input type="number" name="numero" value="<?=$dados_usuario['numero']?>" placeholder="Ex: 345" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Complemento</label><br>
                <input type="text" name="complemento" value="<?=$dados_usuario['complemento']?>" placeholder="Ex: apartamento 45" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Bairro</label><br>
                <input type="text" name="bairro" value="<?=$dados_usuario['bairro']?>" placeholder="Ex: jacare" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Localidade</label><br>
                <input type="text" name="localidade" value="<?=$dados_usuario['localidade']?>" placeholder="Ex: cidade - estado" required class="form-control">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Atualizar dados</button>
            </div>
        </form>
        

    </div>
    
    

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
    