<?php
    $servername = "localhost";
    $username = "root"; // Substitua pelo seu nome de usuário do MySQL
    $password = ""; // Substitua pela sua senha do MySQL
    $database = "projeto_lbs"; // Substitua pelo nome do seu banco de dados

    // Criar conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar se a conexão foi estabelecida corretamente
    if ($conn->connect_error) {
        die("Ocorreu um erro: " . $conn->connect_error);
    }

    // Capturar os valores do formulário
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Consulta SQL para validar o login do administrador
    $sql = "SELECT * FROM administrador WHERE Login='$login' AND Senha='$senha'";

    // Executar a consulta SQL
    $result = $conn->query($sql);

    // Verificar se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        // Login bem-sucedido
        echo "Login de administrador bem-sucedido.";
    } else {
        // Login inválido
        echo "Login de administrador inválido.";
    }

    // Fechar conexão com o banco de dados
    $conn->close();
?>
