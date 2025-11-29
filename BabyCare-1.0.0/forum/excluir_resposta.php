<?php
require("../include/conexao.php");
session_start();

$user_id = $_SESSION['user_id'];
$resposta_id = (int)$_POST['resposta_id'];

// só exclui se a resposta for do usuário
$check = $mysqli->query("SELECT * FROM forum_respostas WHERE id=$resposta_id AND autor_id=$user_id");

if ($check->num_rows > 0) {
    $mysqli->query("DELETE FROM forum_respostas WHERE id=$resposta_id");
}

header("Location: forumlogado.php");
exit;
?>
