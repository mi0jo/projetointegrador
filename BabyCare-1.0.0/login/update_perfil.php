<?php
session_start();
header("Content-Type: application/json");

// Verificar login
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Usuário não autenticado"]);
    exit();
}

include("../include/conexao.php");

$nome = $_POST['nome'] ?? null;
$email = $_POST['email'] ?? null;
$nascimento = $_POST['nascimento'] ?? null;

if (!$nome || !$email) {
    echo json_encode(["status" => "error", "message" => "Dados incompletos"]);
    exit();
}

try {

    // Converter data para formato SQL
    if ($nascimento != "") {
        $dataSQL = date("Y-m-d", strtotime($nascimento));
    } else {
        $dataSQL = null;
    }

    $sql = "UPDATE users SET nome = ?, email = ?, Data_Nascimento = ? WHERE user_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssi", $nome, $email, $dataSQL, $_SESSION['user_id']);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Falha ao atualizar"]);
    }

    $stmt->close();
    $mysqli->close();

} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>
