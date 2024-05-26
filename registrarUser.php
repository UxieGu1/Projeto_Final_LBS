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

    // Capturar os valores do formulário de registro
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $nome_completo = $_POST['nome'];
    $data_nascimento = $_POST['data'];
    $email = $_POST['email'];

    // Consulta SQL para inserir os dados do novo usuário no banco de dados
    $insert_sql = "INSERT INTO usuario (Login, Senha, NomeCompleto, DataNascimento, Email) VALUES ('$login', '$senha', '$nome_completo', '$data_nascimento', '$email')";

    // Executar a consulta SQL
    if ($conn->query($insert_sql) === TRUE) {
        echo "Novo usuário adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar novo usuário: " . $conn->error;
    }

    // Fechar conexão com o banco de dados
    $conn->close();
?>
