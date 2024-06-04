<?php
    $servidor = "localhost";
    $usuario = "root"; 
    $senhaBDD = ""; 
    $bancoDD = "projeto_lbs"; 
    $conexao = new mysqli($servidor, $usuario, $senhaBDD, $bancoDD);

    if ($conexao->connect_error) {
        die("Ocorreu um erro: " . $conexao->connect_error);
    }

    $senha = $_POST['senha'];
    $nome_completo = $_POST['nome'];
    $data_nascimento = $_POST['data'];
    $email = $_POST['email'];

    if (empty($senha) || empty($nome_completo) || empty($data_nascimento) || empty($email)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        $inserir_sql = "INSERT INTO usuario (Senha, NomeCompleto, DataNascimento, Email) VALUES ( '$senha', '$nome_completo', '$data_nascimento', '$email')";

        if ($conexao->query($inserir_sql) === TRUE) {
            echo "Novo usuário adicionado com sucesso.";
        } else {
            echo "Erro ao adicionar novo usuário: " . $conexao->error;
        }
    }

    $conexao->close();
?>
