<?php

class Connection {
    public $host = "localhost:3306";
    public $password = "";
    public $user = "root";
    public $db_name = "db_pendaftar";
    public $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
}

class Peserta extends Connection {
    public function inputPeserta($nama, $usia, $asal_kota, $jenis_kelamin, $cabang_lomba, $tanggal_daftar) {
        $duplicate = mysqli_prepare($this->conn, "SELECT * FROM Peserta WHERE nama = ? AND cabang_lomba = ?");
        mysqli_stmt_bind_param($duplicate, "ss", $nama, $cabang_lomba);
        mysqli_stmt_execute($duplicate);
        mysqli_stmt_store_result($duplicate);

        if (mysqli_stmt_num_rows($duplicate) > 0) {
            mysqli_stmt_close($duplicate);
            return -1; 
        } else {
            mysqli_stmt_close($duplicate);

            $insertResult = $this->insertPeserta($nama, $usia, $asal_kota, $jenis_kelamin, $cabang_lomba, $tanggal_daftar);
            
            return $insertResult ? 1 : 0;
        }
    }

    public function editPeserta($id_peserta, $nama, $usia, $asal_kota, $jenis_kelamin, $cabang_lomba, $tanggal_daftar) {
        $updateQuery = "UPDATE Peserta SET nama=?, usia=?, asal_kota=?, jenis_kelamin=?, cabang_lomba=?, tanggal_daftar=? WHERE id_peserta=?";
        $stmt = mysqli_prepare($this->conn, $updateQuery);
        mysqli_stmt_bind_param($stmt, "ssssssi", $nama, $usia, $asal_kota, $jenis_kelamin, $cabang_lomba, $tanggal_daftar, $id_peserta);
        $updateResult = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $updateResult ? 1 : 0;
    }

    public function deletePeserta($id_peserta) {
        $deleteQuery = "DELETE FROM Peserta WHERE id_peserta=?";
        $stmt = mysqli_prepare($this->conn, $deleteQuery);
        mysqli_stmt_bind_param($stmt, "i", $id_peserta);
        $deleteResult = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $deleteResult ? 1 : 0; 
    }

    public function selectPesertaById($id_peserta) {
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM Peserta WHERE id_peserta = ?");
        mysqli_stmt_bind_param($stmt, "i", $id_peserta);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        
        mysqli_stmt_close($stmt);

        return $row;
    }

    public function getAllPeserta() {
        $result = mysqli_query($this->conn, "SELECT * FROM Peserta");
        $pesertaData = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $pesertaData[] = $row;
        }
        return $pesertaData;
    }

    public function insertPeserta($nama, $usia, $asal_kota, $jenis_kelamin, $cabang_lomba, $tanggal_daftar) {
        $insertQuery = "INSERT INTO Peserta (nama, usia, asal_kota, jenis_kelamin, cabang_lomba, tanggal_daftar) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $insertQuery);
        mysqli_stmt_bind_param($stmt, "ssssss", $nama, $usia, $asal_kota, $jenis_kelamin, $cabang_lomba, $tanggal_daftar);
        $insertResult = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $insertResult;
    }
}
?>
