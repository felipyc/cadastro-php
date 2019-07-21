
Criado por Felipy Camargo

---------------------------------------------------------

Funcionalidades cumpridas:

cadastro, edição e exclusão. 
Armazenamento de dados em banco de dados a escolha, preferencialmente relacional;
Não permitir cadastros com idades menores do que 9 anos;
Não permitir o cadastro do mesmo CPF duas vezes;
Oferecer opções de filtro e ordenação na listagem de pessoas;

---------------------------------------------------------

Estrutura do diretório:

d class //pasta com a class com varios métodos que auxiliam
	usuarios.class.php
- cadastrar.php //formulário para cadastrar novos usuários
- conecta.php //conecta ao banco usando PDO
- editar.php //edita usuário cadastrado
- excluir.php //exclui usuário cadastrado
- index.php // mostra usuários cadastrados

---------------------------------------------------------

Como executar e compilar o sistema criado:

Instalar xamp em https://www.apachefriends.org/pt_br/index.html, executar e apertar next, next
Depois de instalado executa o control panel do xamp e inicia o apache e mysql
apagar arquivos da pasta htdocs(pode estar nesse caminho C:\xampp\htdocs), e colocar os arquivos do projeto dentro dela
digitar na url do navegador na primeira aba localhost e na segunda localhost/phpmyadmin
importar o banco de dados na aba localhost/phpmyadmin, escolher a aba importar no phpmyadmin
depois dar f5 na aba localhost

