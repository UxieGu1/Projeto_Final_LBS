<?php
    $servidor = "localhost";
    $usuario = "root"; 
    $senhaBDD = ""; 
    $bancoDD = "projeto_lbs";
    $conexao = new mysqli($servidor, $usuario, $senhaBDD, $bancoDD);

    if ($conexo->connect_error) {
        die("Ocorreu um erro: " . $conexao->connect_error);
    }

    $produto = $_POST['produto'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    if (empty($produto) || empty($descricao) || empty($preco) ) {
        echo "Por favor, preencha todos os campos.";
    } else {
        $inserir_sql = "INSERT INTO produto (Nome, Descrição, Preço) VALUES ('$produto', '$descricao', '$preco')";

        if ($conexao->query($inserir_sql) === TRUE) {
            echo "Novo produto adicionado com sucesso.";
        } else {
            echo "Erro ao adicionar novo produto: " . $conexao->error;
        }
    }

    $conexao->close();
?>
