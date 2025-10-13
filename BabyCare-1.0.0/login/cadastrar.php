<?php
include("../include/conexao.php");
if (!$mysqli) {
    die("Erro na conexão: " . mysqli_connect_error());
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmar_senha'];
    $nascimento = $_POST['nascimento'];

    if ($senha !== $confirmar) {
        echo "As senhas não coincidem.";
        exit();
    }

    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Email já cadastrado.";
        exit();
    }

    $nome_completo = $nome . " " . $sobrenome;
    $sql = "INSERT INTO users (nome, email, senha, tipo, nascimento, email_confirmado)
            VALUES (?, ?, ?, 'user', ?, TRUE)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssss", $nome_completo, $email, $senha, $nascimento);

if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso!";
    exit();
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
    exit();
}


}
?>
