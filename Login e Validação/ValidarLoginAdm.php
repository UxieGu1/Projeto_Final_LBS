<?php
    $servidor = "localhost";
    $usuario = "root"; 
    $senhaBDD = ""; 
    $bancoDD = "projeto_lbs"; 
    $conexao = new mysqli($servidor, $usuario, $senhaBDD, $bancoBDD);

    if ($conexao->connect_error) {
        die("Ocorreu um erro: " . $conexao->connect_error);
    }

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if (empty($login) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        $sql = "SELECT * FROM administrador WHERE Login='$login' AND Senha='$senha'";

        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            echo "Login de administrador bem-sucedido.";
        } else {
            echo "Login de administrador inválido.";
        }
    }

    $conexao->close();
?>
