<?php
if(isset($_POST['id_produto'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "projeto_lbs";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Ocorreu um erro ao conectar ao banco de dados: " . $conn->connect_error);
    }

    $id_produto = $conn->real_escape_string($_POST['id_produto']);

    $sql = "DELETE FROM produto WHERE id = $id_produto";

    if ($conn->query($sql) === TRUE) {
        echo "Produto removido com sucesso.";
    } else {
        echo "Erro ao remover produto: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID do produto não foi fornecido.";
}
?>
