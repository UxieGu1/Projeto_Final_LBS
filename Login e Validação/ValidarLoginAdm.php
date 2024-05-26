<?php
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $database = "projeto_lbs"; 
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Ocorreu um erro: " . $conn->connect_error);
    }

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if (empty($login) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        $sql = "SELECT * FROM administrador WHERE Login='$login' AND Senha='$senha'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Login de administrador bem-sucedido.";
        } else {
            echo "Login de administrador inválido.";
        }
    }

    $conn->close();
?>
