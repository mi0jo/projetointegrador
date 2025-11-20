<?php
session_start();
include("../include/conexao.php");

if (!$mysqli) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}


if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $senha = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if ($senha === $user['senha']) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['tipo'] = $user['tipo'];
            $_SESSION['logado'] = true;

            if ($user['tipo'] === 'admin') {
                header("Location: ../adm/indexadm.php");
            } else {
                header("Location: ../logado/perfillogado.php");
            }
            exit();
        } else {
            // Senha incorreta
            header("Location: ../deslogado/login.php?status=erro");
            exit();
        }
    } else {
        // Usuário não encontrado
        header("Location: ../deslogado/login.php?status=erro");
        exit();
    }
} else {
    // Formulário não enviado corretamente
    header("Location: ../deslogado/login.php");
    exit();
}
?>
