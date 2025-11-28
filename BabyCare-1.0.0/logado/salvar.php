<?php
require("../include/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id     = $_SESSION['user_id'];;
    $data_inicio = $_POST['data_inicio'];
    $data_fim    = !empty($_POST['data_fim']) ? $_POST['data_fim'] : null;
    $fluxo       = !empty($_POST['fluxo']) ? $_POST['fluxo'] : null;
    $humor       = $_POST['humor'];
    $remedios    = $_POST['remedios'];
    $sintomas    = isset($_POST['sintomas']) ? implode(", ", $_POST['sintomas']) : null;

    $sql = "INSERT INTO calendario_menstrual 
        (user_id, data_inicio, data_fim, fluxo, humor, remedios) 
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("isssss", $user_id, $data_inicio, $data_fim, $fluxo, $humor, $remedios);
$stmt->execute();

}


?>
