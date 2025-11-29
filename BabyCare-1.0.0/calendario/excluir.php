<?php
require("../include/conexao.php");
header('Content-Type: application/json');

if (isset($_POST['id'])) {
    $id = intval($_POST['id']); 

    $sql = "DELETE FROM calendario_menstrual WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
} else {
    echo json_encode(["success" => false, "error" => "ID do evento não informado"]);
}
?>
