<?php
require("../include/conexao.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id  = $_POST['post_id'];
    $conteudo = $_POST['conteudo'];
    $autor_id = $_SESSION['user_id'];

    $stmt = $mysqli->prepare("INSERT INTO forum_respostas (post_id, autor_id, conteudo) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $post_id, $autor_id, $conteudo);

    if ($stmt->execute()) {
        header("Location: forumlogado.php?status=resposta_sucesso");
    } else {
        echo "Erro: " . $mysqli->error;
    }
}
?>
