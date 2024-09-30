<?php
 include "db.php"

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql = "SELECT * FROM users WHERE email = $email";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam('$email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return false;
 }


?>