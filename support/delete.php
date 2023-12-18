<?php
include "../connect.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $inputPeserta = new Peserta(); 

    $resultDelete = $inputPeserta->deletePeserta($id);

    if ($resultDelete === 1) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Gagal menghapus data peserta";
    }
} else {
    echo "Input Salah!";
}
?>