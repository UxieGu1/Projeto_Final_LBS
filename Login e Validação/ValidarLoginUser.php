<?php
    $servidor = "localhost";
    $usuario = "root"; 
    $senhaBDD = ""; 
    $bancoDD = "projeto_lbs"; 
    $conexao = new mysqli($servidor, $usuario, $senhaBDD, $bancoDD);

    if ($conexao->connect_error) {
        die("Ocorreu um erro: " . $conexao->connect_error);
    }

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if (empty($login) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
        exit(); 
    }

    $ver_sql = "SELECT * FROM usuario WHERE Login='$login'";
    $ver_resultado = $conexao->query($ver_sql);

    if ($ver_resultado->num_rows > 0) {
        $sql = "SELECT * FROM usuario WHERE Login='$login' AND Senha='$senha'";
        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
            echo "Login de usuário bem-sucedido.";
        } else {
            echo "Senha incorreta.";
        }
    } else {
        header("Location: cadastroUser.html");
        exit();
    }

    $conexao->close();
?>
