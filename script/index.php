<?php
 include "db.php";

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $teste = $conn -> query($sql);

    if($teste -> num_rows > 0){

            $result = mysqli_fetch_array($teste);
            $senhaDb = $result['senha'];
            $id = $result['id'];
            if($senha == $senhaDb){
                header("notes.php?id=$id");
            }
            else{
                echo"senha incorreta";
            }
    }
    else{
        echo "usuário não encontrado";
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
        <form method="POST" action="index.php">
        <input type="hidden" name="action" value="action2">
            <h1>Login</h1>

            <label for="email">Nome:</label>
            <input type="email" name="email" required>

            <label for="senha">Nome:</label>
            <input type="password" name="senha" required>

            <input class="botao" type="submit" value="Entrar">
        </form>
        <a href="register.php">
            <button id="botaoCadastro" class="botao">Cadastro</button>
        </a>
    </body>
</html>
