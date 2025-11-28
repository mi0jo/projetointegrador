<?php
session_start();
require("../include/conexao.php");

header('Content-Type: application/json');


$user_id = $_SESSION['user_id'];;
$sql = "SELECT * FROM calendario_menstrual WHERE user_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$events = [];
while ($row = $result->fetch_assoc()) {
    $color = "#ffcccc"; // leve
    if ($row['fluxo'] == "moderado") $color = "#ff9999";
    if ($row['fluxo'] == "intenso") $color = "#ff6666";

    $events[] = [
        'id'      => $row['id'], 
    'user_id'    => $row['user_id'],
    'title' => "Humor: ".$row['humor']." | Remédios: ".$row['remedios'],
    'start' => $row['data_inicio'],
    // só adiciona 'end' se realmente tiver data_fim
    'end' => !empty($row['data_fim']) 
    ? $row['data_fim'] . 'T23:59:59' 
    : null,

    'color' => $color
];

}

echo json_encode($events);
?>
