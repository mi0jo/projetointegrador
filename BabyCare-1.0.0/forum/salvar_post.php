<?php
require("../include/conexao.php");
session_start();

$user_id = $_SESSION['user_id'];
$post_id = (int)$_POST['post_id'];

$check = $mysqli->query("SELECT * FROM posts_salvos WHERE user_id=$user_id AND post_id=$post_id");

if ($check->num_rows > 0) {
    $mysqli->query("DELETE FROM posts_salvos WHERE user_id=$user_id AND post_id=$post_id");
} else {
    $mysqli->query("INSERT INTO posts_salvos (user_id, post_id) VALUES ($user_id, $post_id)");
}

header("Location: forumlogado.php");
exit;
?>
