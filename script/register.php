<?php 

include "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuario(nome, email, senha) VALUES($nome, $email, $senha)";

    $result = $conn -> query($sql);

    if($result === true){
        echo "sucesso";
    }
    else{
        echo "Erro $sql <br/> $conn -> error";
    }

    
}

?>