<?php
if(isset($_POST['produto']) && isset($_POST['descricao']) && isset($_POST['preco'])) {
    $servidor = "localhost";
    $usuario = "root"; 
    $senhaBDD = ""; 
    $bancoDD = "projeto_lbs";
    $conexao = new mysqli($servidor, $usuario, $senhaBDD, $bancoDD);

    if ($conexao->connect_error) {
        die("Ocorreu um erro ao conectar ao banco de dados: " . $conexao->connect_error);
    }

    $produto = $conexao->real_escape_string($_POST['produto']);
    $descricao = $conexao->real_escape_string($_POST['descricao']);
    $preco = $conexao->real_escape_string($_POST['preco']);

    $sql = "SELECT * FROM produto WHERE Nome LIKE '%$produto%' AND Descrição LIKE '%$descricao%' AND Preço <= $preco";

    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<h2>Produtos Encontrados:</h2>";
        while($linha = $resultado->fetch_assoc()) {
            echo "<p>Nome: " . $linha["Nome"] . "</p>";
            echo "<p>Descrição: " . $linha["Descrição"] . "</p>";
            echo "<p>Preço: " . $linha["Preço"] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "Nenhum produto encontrado com os critérios fornecidos.";
    }

    $conexao->close();

} else {
    echo "Por favor, preencha todos os campos do formulário.";
}
?>
