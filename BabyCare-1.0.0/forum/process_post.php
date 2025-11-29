<?php
require("../include/conexao.php");
session_start();

$user_id = $_SESSION['user_id']; // quem está logado
$titulo  = $_POST['titulo'] ?? '';
$conteudo = $_POST['conteudo'] ?? '';
$tags    = $_POST['tags'] ?? '';

if (!empty($titulo) && !empty($conteudo)) {
    $stmt = $mysqli->prepare("INSERT INTO forum_posts (autor_id, titulo, conteudo, data_postagem) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iss", $user_id, $titulo, $conteudo);
    $stmt->execute();
    $stmt->close();
}

// volta para o fórum
header("Location: forumlogado.php");
exit;
?>
