<?php 

include "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuario(nome, email, senha) VALUES('$nome', '$email', '$senha')";

    $result = $conn -> query($sql);

    if($result === true){
        echo "sucesso";
    }
    else{
        echo "Erro $sql <br/> $conn -> error";
    }


}

?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="POST" action="register.php">
        <input type="hidden" name="action" value="action2">
            <h1>Login</h1>

            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="text" name="senha" required>

            <input class="botao" type="submit" value="Entrar">
        </form>
        <a href="register.php">
            <button id="botaoCadastro" class="botao">Cadastro</button>
        </a>
    </body>
</html>
