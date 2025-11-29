<?php
session_start();
require("../include/conexao.php");

if (!isset($_SESSION['user_id'])) {
    die("Usuário não está logado.");
}

$user_id = (int)$_SESSION['user_id'];

// Exclui dados relacionados ao usuário
$mysqli->query("DELETE FROM calendario_menstrual WHERE user_id = $user_id");
$mysqli->query("DELETE FROM forum_respostas WHERE autor_id = $user_id");
$mysqli->query("DELETE FROM forum_posts WHERE autor_id = $user_id");

// Agora exclui o usuário
$mysqli->query("DELETE FROM users WHERE user_id = $user_id");

// Finaliza sessão
session_destroy();

// Redireciona para página inicial com mensagem
header("Location: ../deslogado/indexsemlogin.php?msg=conta_excluida");
exit();
?>
