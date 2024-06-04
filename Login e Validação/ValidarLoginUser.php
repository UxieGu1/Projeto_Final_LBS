<?php
$servidor = "localhost";
$usuario = "root"; 
$senhaBDD = ""; 
$bancoDD = "projeto_lbs"; 
$conexao = new mysqli($servidor, $usuario, $senhaBDD, $bancoDD);

if ($conexao->connect_error) {
    die("Ocorreu um erro: " . $conexao->connect_error);
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if (empty($login) || empty($email) || empty($senha)) {
    echo "Por favor, preencha todos os campos.";
    exit(); 
}

$ver_sql = "SELECT * FROM usuario WHERE Nome='$nome' AND Email='$email' AND Senha='$senha'";
$ver_resultado = $conexao->query($ver_sql);

if ($ver_resultado->num_rows > 0) {
    echo "Login de usuário bem-sucedido.";
} else {
    echo "Login, e-mail ou senha incorretos.";
}

$conexao->close();
?>
