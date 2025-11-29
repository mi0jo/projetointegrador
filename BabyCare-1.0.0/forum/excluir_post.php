<?php
require("../include/conexao.php");
session_start();

$user_id = $_SESSION['user_id'];
$post_id = (int)$_POST['post_id'];

// só exclui se o post for do usuário
$check = $mysqli->query("SELECT * FROM posts_forum WHERE id=$post_id AND autor_id=$user_id");

if ($check->num_rows > 0) {
    // exclui respostas ligadas ao post
    $mysqli->query("DELETE FROM forum_respostas WHERE post_id=$post_id");
    // exclui o post
    $mysqli->query("DELETE FROM posts_forum WHERE id=$post_id");
}

header("Location: forumlogado.php");
exit;
?>
