<?php
require("../include/conexao.php");
header('Content-Type: application/json');

// Verifica se o ID do evento foi enviado
if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // pega o id do evento

    // Prepara a query para excluir pelo id (PK da tabela calendario_menstrual)
    $sql = "DELETE FROM calendario_menstrual WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Se realmente excluiu, retorna sucesso
        echo json_encode(["success" => true]);
    } else {
        // Se houve erro na execução
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
} else {
    // Se não veio o id no POST
    echo json_encode(["success" => false, "error" => "ID do evento não informado"]);
}
?>
