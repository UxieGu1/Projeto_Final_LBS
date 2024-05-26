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
    $nome_completo = $_POST['nome'];
    $data_nascimento = $_POST['data'];
    $email = $_POST['email'];

    if (empty($login) || empty($senha) || empty($nome_completo) || empty($data_nascimento) || empty($email)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        $insert_sql = "INSERT INTO usuario (Login, Senha, NomeCompleto, DataNascimento, Email) VALUES ('$login', '$senha', '$nome_completo', '$data_nascimento', '$email')";

        if ($conn->query($insert_sql) === TRUE) {
            echo "Novo usuário adicionado com sucesso.";
        } else {
            echo "Erro ao adicionar novo usuário: " . $conn->error;
        }
    }

    $conn->close();
?>
