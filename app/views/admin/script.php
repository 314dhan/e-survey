<?php
require "../../config/Connection.php";
$pageTitle = "admin";

$sql = "SELECT jawaban1, jawaban2, jawaban3, jawaban4, jawaban5, jawaban6, jawaban7, jawaban8 FROM survey_ds";
$resultDs = mysqli_query($conn, $sql);

$sql = "SELECT jawaban1, jawaban2, jawaban3, jawaban4, jawaban5, jawaban6, jawaban7, jawaban8 FROM survey_mhs";
$resultMhs = mysqli_query($conn, $sql);

$data = [
    'dataMhs' => $resultMhs->fetch_all(MYSQLI_ASSOC),
    'dataDs' => $resultDs->fetch_all(MYSQLI_ASSOC)
];

header('Content-Type: application/json');
echo json_encode($data);
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="script.js"></script>