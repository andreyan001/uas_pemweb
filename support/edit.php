<?php
include "../connect.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $selectPeserta = new Peserta(); 

    $pesertaData = $selectPeserta->selectPesertaById($id);

    if (!$pesertaData) {
        echo "Data tidak ditemukan";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["_method"]) && strtoupper($_POST["_method"]) === "PUT") {
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $usia = $_POST["usia"];
        $asal_kota = $_POST["asal_kota"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $cabang_lomba = $_POST["cabang_lomba"];
        $tanggal_daftar = $_POST["tanggal_daftar"];

        $inputPeserta = new Peserta(); 
        $resultEdit = $inputPeserta->editPeserta($id, $nama, $usia, $asal_kota, $jenis_kelamin, $cabang_lomba, $tanggal_daftar);

        if ($resultEdit === 1) {
            header("Location: ../index.php");
            exit();
        } else {
            $messageEdit = "EDIT GAGAL!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peserta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../coba.css">
    <script defer src="../coba.js"></script>
</head>

<body>
    <div class="container">
        <form id="form" action="edit.php" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?php echo $pesertaData['id']; ?>">
            <h1>Edit Peserta Data</h1>
            <div class="input-control">
                <label for="nama">Nama</label>
                <input id="nama" name="nama" type="text" value="<?php echo $pesertaData['nama']; ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="usia">Usia</label>
                <input id="usia" name="usia" type="number" value="<?php echo $pesertaData['usia']; ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="asal_kota">Asal Kota</label>
                <input id="asal_kota" name="asal_kota" type="text" value="<?php echo $pesertaData['asal_kota']; ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin">
                    <option value="laki-laki" <?php echo ($pesertaData['jenis_kelamin'] == 'laki-laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                    <option value="perempuan" <?php echo ($pesertaData['jenis_kelamin'] == 'perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="cabang_lomba">Cabang Perlombaan</label>
                <select id="cabang_lomba" name="cabang_lomba">
                    <option value="lari" <?php echo ($pesertaData['cabang_lomba'] == 'lari') ? 'selected' : ''; ?>>Lari</option>
                    <option value="renang" <?php echo ($pesertaData['cabang_lomba'] == 'renang') ? 'selected' : ''; ?>>Renang</option>
                </select>
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="tanggal_daftar">Tanggal Pendaftaran</label>
                <input id="tanggal_daftar" name="tanggal_daftar" type="date" value="<?php echo $pesertaData['tanggal_daftar']; ?>">
                <div class="error"></div>
            </div>
            <button type="submit">Update Peserta</button>
        </form>
    </div>
</body>

</html>