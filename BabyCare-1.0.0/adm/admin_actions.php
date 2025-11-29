<?php
session_start();
require("../include/conexao.php");
if (!isset($_SESSION['user_id'])) {
    die("Usuário não está logado.");
}

if ($_SESSION['tipo'] !== 'admin') {
    die("Acesso negado. Apenas administradores.");
}
$action = $_GET['action'] ?? null;

if ($action === 'delete_post') {
    $post_id = (int)($_GET['post_id'] ?? 0);

    if ($post_id > 0) {
        // Exclui respostas ligadas ao post
        $mysqli->query("DELETE FROM forum_respostas WHERE post_id = $post_id");
        // Exclui o post
        $mysqli->query("DELETE FROM forum_posts WHERE id = $post_id");

        header("Location: indexadm.php?msg=post_excluido");
        exit();
    } else {
        echo "ID do post inválido.";
    }

} elseif ($action === 'delete_user') {
    $user_id = (int)($_GET['user_id'] ?? 0);

    if ($user_id > 0) {
        // Exclui posts e respostas do usuário antes
        $mysqli->query("DELETE FROM calendario_menstrual WHERE user_id = $user_id");
        $mysqli->query("DELETE FROM forum_respostas WHERE autor_id = $user_id");
        $mysqli->query("DELETE FROM forum_posts WHERE autor_id = $user_id");
        // Exclui o usuário
        $mysqli->query("DELETE FROM users WHERE user_id = $user_id");

        header("Location: indexadm.php?msg=usuario_excluido");
        exit();
    } else {
        echo "ID do usuário inválido.";
    }

} else {
    echo "Ação inválida.";
}
?>
