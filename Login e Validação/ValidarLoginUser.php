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

    // Consulta SQL para verificar se o login já existe
    $check_sql = "SELECT * FROM usuario WHERE Login='$login'";
    $check_result = $conn->query($check_sql);

    // Verificar se o login já existe
    if ($check_result->num_rows > 0) {
        // Login já existe, realizar login
        $sql = "SELECT * FROM usuario WHERE Login='$login' AND Senha='$senha'";
        $result = $conn->query($sql);

        // Verificar se a consulta retornou algum resultado
        if ($result->num_rows > 0) {
            // Login bem-sucedido
            echo "Login de usuário bem-sucedido.";
        } else {
            // Senha incorreta
            echo "Senha incorreta.";
        }
    } else {
        // Login não existe, redirecionar para a página de registro
        header("Location: registroUser.html");
        exit();
    }

    // Fechar conexão com o banco de dados
    $conn->close();
?>
