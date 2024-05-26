<?php
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $database = "projeto_lbs"; 
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Ocorreu um erro: " . $conn->connect_error);
    }

    $produto = $_POST['produto'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    if (empty($produto) || empty($descricao) || empty($preco) ) {
        echo "Por favor, preencha todos os campos.";
    } else {
        $insert_sql = "INSERT INTO produto (Nome, Descrição, Preço) VALUES ('$produto', '$descricao', '$preco')";

        if ($conn->query($insert_sql) === TRUE) {
            echo "Novo produto adicionado com sucesso.";
        } else {
            echo "Erro ao adicionar novo produto: " . $conn->error;
        }
    }

    $conn->close();
?>
