<?php

    class Usuarios{

        private $pdo;

        # métodos especiais getters e setters

            public function __construct($pdo){
                $this->pdo = $pdo;
            }

        # métodos personalizados

            //Inserir novo usuário no banco
            public function inserirUsuario($nome, $data_nascimento, $cpf, $telefone, $email, $cep, $logradouro, $numero, $complemento, $bairro, $localidade){
                $sql = "INSERT INTO usuarios (nome, data_nascimento, cpf, telefone, email, cep, logradouro, numero, complemento, bairro, localidade) VALUES (:nome, :data_nascimento, :cpf, :telefone, :email, :cep, :logradouro, :numero, :complemento, :bairro, :localidade)";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(":nome", $nome);
                $sql->bindValue(":data_nascimento", $data_nascimento);
                $sql->bindValue(":cpf", $cpf);
                $sql->bindValue(":telefone", $telefone);
                $sql->bindValue(":email", $email);
                $sql->bindValue(":cep", $cep);
                $sql->bindValue(":logradouro", $logradouro);
                $sql->bindValue(":numero", $numero);
                $sql->bindValue(":complemento", $complemento);
                $sql->bindValue(":bairro", $bairro);
                $sql->bindValue(":localidade", $localidade);
                $sql->execute();
            }

            //Retorna usuários cadastrados no banco, com ou sem filtro
            public function usuariosCadastrados($filtro){
                $usuarios = array();
                if($filtro == 1){
                    $sql = $this->pdo->query("SELECT * FROM usuarios ORDER BY nome ASC");
                    if( $sql->rowCount() > 0 ){
                        $usuarios = $sql->fetchAll();
                    }
                }else{
                    $sql = $this->pdo->query("SELECT * FROM usuarios ORDER BY data_nascimento DESC");
                    if( $sql->rowCount() > 0 ){
                        $usuarios = $sql->fetchAll();
                    }
                }   
                return $usuarios;
            }

            //Retorna dados de um usuário especifico
            public function usuarioEspecifico($id){
                $usuario = "";
                $sql = "SELECT * FROM usuarios WHERE id = :id";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(":id", $id);
                $sql->execute();
                if( $sql->rowCount() > 0){
                    $usuario = $sql->fetch();
                }
                return $usuario;
            }

            //Verifica se o cpf não está cadastrado
            public function cpfNaoEstaCadastrado($cpf){
                $sql = "SELECT * FROM usuarios WHERE cpf = :cpf";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(":cpf", $cpf);
                $sql->execute();

                if( $sql->rowCount() > 0 ){
                    return false;
                }else{
                    return true;
                }
            }

            //Atualiza dados do usuário
            public function atualizaDadosUsuario($id, $nome, $telefone, $email, $cep, $logradouro, $numero, $complemento, $bairro, $localidade){
                $sql = "UPDATE usuarios SET nome = :nome, telefone = :telefone, email = :email, cep = :cep, logradouro = :logradouro, numero = :numero, complemento = :complemento, bairro = :bairro, localidade = :localidade WHERE id = :id";
                
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(":id", $id);
                $sql->bindValue(":nome", $nome);
                $sql->bindValue(":telefone", $telefone);
                $sql->bindValue(":email", $email);
                $sql->bindValue(":cep", $cep);
                $sql->bindValue(":logradouro", $logradouro);
                $sql->bindValue(":numero", $numero);
                $sql->bindValue(":complemento", $complemento);
                $sql->bindValue(":bairro", $bairro);
                $sql->bindValue(":localidade", $localidade);
                $sql->execute();
            }

            //Excluir usuário
            public function excluirUsuario($id){
                $sql = "DELETE FROM usuarios WHERE id = :id";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(":id", $id);
                $sql->execute();
                header("location: usuarios.php");
            }

            //Retorna a idade do usuário
            public function idadeUsuario($data_nascimento){

                //obeservação, não construi esse algoritmo da data de nascimento, entendo o que está acontecendo ali, já tinha utilizado essa lógica em outros algoritmos que fiz e reutilizei.

                //Data atual
                $dia = date('d');
                $mes = date('m');
                $ano = date('Y');

                //Data do aniversário
                $nascimento = explode('-', $data_nascimento);
                $dianasc = ($nascimento[2]);
                $mesnasc = ($nascimento[1]);
                $anonasc = ($nascimento[0]);
                
                //Calculando sua idade
                $idade = $ano - $anonasc; // simples, ano- nascimento!
                if ($mes < $mesnasc) // se o mes é menor, só subtrair da idade
                {
                    $idade--;
                    return $idade;
                }
                elseif ($mes == $mesnasc && $dia < $dianasc) // se esta no mes do aniversario mas não chegou a data, subtrai da idade
                {
                    $idade--;
                    return $idade;
                }
                else // ja fez aniversario no ano, tudo certo!
                {
                    return $idade;
                }

            }

            //Verifica se o cpf é válido
            public function cpfValido($cpf){

                //fonte: https://laennder.com/como-e-feito-o-calculo-de-validacao-cpf/

                //calcula o primeiro digito
                $soma1 = 0;
                for($a = 10, $c = 0; $c < 9 ;$c++, $a--){
                    
                    $soma1 += $cpf{$c} * $a;
                    // echo $soma1."<br>";
                }
                $digito1 = (11 - $soma1 % 11 > 9)?0:11 - $soma1%11;
                // echo $digito1;
                
                echo "<br>";
                echo "<br>";

                //calcula o 2 digito
                $soma2 = 0;
                for($a = 11, $c = 0; $c < 9 ;$c++, $a--){
                    
                    $soma2 += $cpf{$c} * $a;
                    // echo $soma2."<br>";
                }
                $digito2 = (11 - ($soma2 + $digito1*2) % 11 > 9)?0:11 - ($soma2 + $digito1*2) % 11;
                // echo $digito2;

                //verifica os digitos do cpf recebido são iguais
                if( $digito1 == $cpf{9} AND $digito2 == $cpf{10} ){
                    return true;
                }else{
                    return false;
                }

            }

    }