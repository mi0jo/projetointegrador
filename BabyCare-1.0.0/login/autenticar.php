<?php
session_start();
include("../include/conexao.php");

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $senha = trim($_POST['password']); // remove espaços extras

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
    if (password_verify($senha, $user['senha'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['nome']    = $user['nome'];
            $_SESSION['tipo']    = $user['tipo'];
            $_SESSION['logado']  = true;

            if ($user['tipo'] === 'admin') {
                header("Location: ../adm/indexadm.php");
            } else {
                header("Location: ../logado/perfillogado.php");
            }
            exit();
        } else {
            header("Location: ../deslogado/login.php?status=erro");
            exit();
        }
    } else {
        header("Location: ../deslogado/login.php?status=erro");
        exit();
    }
} else {
    header("Location: ../deslogado/login.php");
    exit();
}
?>
