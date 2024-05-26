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
        exit(); 
    }

    $check_sql = "SELECT * FROM usuario WHERE Login='$login'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        $sql = "SELECT * FROM usuario WHERE Login='$login' AND Senha='$senha'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Login de usuário bem-sucedido.";
        } else {
            echo "Senha incorreta.";
        }
    } else {
        header("Location: registroUser.html");
        exit();
    }

    $conn->close();
?>
