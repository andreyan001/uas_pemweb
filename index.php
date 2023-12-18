<?php
session_start();

include "classConnection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $usia = $_POST["usia"];
    $asal_kota = $_POST["asal_kota"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $cabang_lomba = $_POST["cabang_lomba"];
    $tanggal_daftar = $_POST["tanggal_daftar"];

    $_SESSION['form_data'] = compact('nama','usia','asal_kota','jenis_kelamin','cabang_lomba','tanggal_daftar');
    $inputPeserta = new Peserta();
    $resultPeserta = $DatainputPeserta->inputPeserta($nama, $usia, $asal_kota, $jenis_kelamin, $cabang_lomba, $tanggal_daftar);

    if ($resultPeserta === -1) {
        $message = "Terjadi Masalah";
    } elseif ($resultPeserta=== 1) {
        $message = "Berhasil Mendaftar";
        header("Location: index.php");
        exit();
    } else {
        $message = "Gagal Mendaftar, COBA LAGI!";
    }
    echo $message;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peserta</title>
    <link rel="stylesheet" href="./coba.css">
    <script defer src="./coba.js"></script>
</head>

<body>

    <h2 class="title">Data Peserta</h2>
    <?php

    $selectPeserta = new Peserta();
    $resultPeserta = $selectPeserta->getAllPeserta();
    $no = 1;

    echo "<table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Asal Kota</th>
            <th>Jenis Kelamin</th>
            <th>Cabang Perlombaan</th>
            <th>Tanggal Pendaftaran</th>
            <th>Action</th>
        </tr>
    foreach ($resultPeserta as $row) {
        echo "<tr>
            <td>" . $no++ . "</td>
            <td>" . $row["nama"] . "</td>
            <td>" . $row["usia"] . "</td>
            <td>" . $row["asal_kota"] . "</td>
            <td>" . $row["jenis_kelamin"] . "</td>
            <td>" . $row["cabang_lomba"] . "</td>
            <td>" . $row["tanggal_daftar"] . "</td>
            <td class='action-buttons'>
                <a class='edit-button' href='./support/edit.php?id=" . $row["id_peserta"] . "'>Edit</a>
                <a class='delete-button' href='./support/delete.php?id=" . $row["id_peserta"] . "'>Delete</a>
            </td>
          </tr>";
    }

    echo "</table>";
    ?>
<form id="form" action="index.php" method="POST">
            <h1>Tambah data</h1>
            <div class="input-control">
                <label for="nama">Nama</label>
                <input id="nama" name="nama" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="usia">Usia</label>
                <input id="Usia" name="Usia" type="number">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="asal_kota">Asal Kota</label>
                <input id="asal_kota" name="asal_kota" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin">
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="cabang_lomba">Cabang Perlombaan</label>
                <select id="cabang_lomba" name="cabang_lomba">
                    <option value="laki-laki">Lari</option>
                    <option value="perempuan">Renang</option>
                </select>
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="tanggal_daftar">Tanggal Pendaftaran</label>
                <input id="tanggal_daftar" name="tanggal_daftar" type="date">
                <div class="error"></div>
            </div>
            <button type="submit">Submit</button>
        </form>
    <div id="cookie-notice">
        <p>Kami menggunakan cookie untuk meningkatkan pengalaman Anda di situs web ini. Dengan melanjutkan, Anda setuju dengan kebijakan cookie kami.</p>
        <button onclick="acceptCookies()">Setuju</button>
    </div>

    <script>
        function acceptCookies() {
            setCookie("cookie-user", "true", 90);
            document.getElementById("cookie-notice").style.display = "none";
        }

        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        var cookieAccepted = getCookie("cookie-user");
        if (cookieAccepted === "true") {
            document.getElementById("cookie-notice").style.display = "none";
        }
    </script>
    <script>
        window.onload = function () {
            const formData = JSON.parse(localStorage.getItem('formData')) || {};
            document.getElementById('nama').value = formData.nama || '';
            document.getElementById('usia').value = formData.usia || '';
            document.getElementById('asal_kota').value = formData.asal_kota || '';
            document.getElementById('jenis_kelamin').value = formData.jenis_kelamin || '';
            document.getElementById('cabang_lomba').value = formData.cabang_lomba || '';
            document.getElementById('tanggal_daftar').value = formData.tanggal_daftar || '';
        };

        document.getElementById('form').addEventListener('Submit', function () {
            const formData = {
                nama: document.getElementById('nama').value,
                usia: document.getElementById('usia').value,
                asal_kota: document.getElementById('asal_kota').value,
                jenis_kelamin: document.getElementById('jenis_kelamin').value,
                cabang_lomba: document.getElementById('cabang_lomba').value,
                tanggal_daftar: document.getElementById('tanggal_daftar').value,
            };
            localStorage.setItem('formData', JSON.stringify(formData));
        });
    </script>
</body>

</html>