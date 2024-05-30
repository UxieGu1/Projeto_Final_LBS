<?php
if(isset($_POST['id_produto'])) {
    $servidor = "localhost";
    $usuario = "root"; 
    $senhaBDD = ""; 
    $bancoDD = "projeto_lbs";
    $conexao = new mysqli($servidor, $usuario, $senhaBDD, $bancoDD);

    if ($conexao->connect_error) {
        die("Ocorreu um erro ao conectar ao banco de dados: " . $conexao->connect_error);
    }

    $id_produto = $conexao->real_escape_string($_POST['id_produto']);

    $sql = "DELETE FROM produto WHERE id = $id_produto";

    if ($conexao->query($sql) === TRUE) {
        echo "Produto removido com sucesso.";
    } else {
        echo "Erro ao remover produto: " . $conexao->error;
    }

    $conexao->close();
} else {
    echo "ID do produto não foi fornecido.";
}
?>
