<?php
    $servidor = "localhost";
    $usuario = "root"; 
    $senhaBDD = ""; 
    $bancoDD = "projeto_lbs"; <!-- Aqui vai ter o nome do bdd que tu criou -->
    $conexao = new mysqli($servidor, $usuario, $senhaBDD, $bancoDD);

    if ($conexao->connect_error) {
        die("Ocorreu um erro: " . $conexao->connect_error);
    }

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    if (empty($nome) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        $sql = "SELECT * FROM administrador WHERE Login='$nome' AND Senha='$senha'";

        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
            echo "Login de administrador bem-sucedido.";
        } else {
            echo "Login de administrador inválido.";
        }
    }

    $conexao->close();
?>
