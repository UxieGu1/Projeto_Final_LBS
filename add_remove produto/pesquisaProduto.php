<?php
if(isset($_POST['produto']) && isset($_POST['descricao']) && isset($_POST['preco'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "projeto_lbs";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Ocorreu um erro ao conectar ao banco de dados: " . $conn->connect_error);
    }

    $produto = $conn->real_escape_string($_POST['produto']);
    $descricao = $conn->real_escape_string($_POST['descricao']);
    $preco = $conn->real_escape_string($_POST['preco']);

    $sql = "SELECT * FROM produto WHERE Nome LIKE '%$produto%' AND Descrição LIKE '%$descricao%' AND Preço <= $preco";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Produtos Encontrados:</h2>";
        while($row = $result->fetch_assoc()) {
            echo "<p>Nome: " . $row["Nome"] . "</p>";
            echo "<p>Descrição: " . $row["Descrição"] . "</p>";
            echo "<p>Preço: " . $row["Preço"] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "Nenhum produto encontrado com os critérios fornecidos.";
    }

    $conn->close();

} else {
    echo "Por favor, preencha todos os campos do formulário.";
}
?>
