<?php
include_once '../koneksi.php';

/**
 * @var $connection PDO
 */

$nim = $_POST['nim'] ?? '';
$nama = $_POST['nama'] ?? '';
$tanggal = $_POST['tgl_lahir'] ?? '';
$alamat = $_POST['alamat'] ?? '';
$no_hp = $_POST['no_hp'] ?? '';
$email = $_POST['email'] ?? '';

try {
    $statement = $connection -> prepare("INSERT INTO `mahasiswa` (`nim`, `nama`, `tgl_lahir`, `alamat`, `no_hp`, `email`) VALUES (:nim, :nama, :tanggal, :alamat, :nohp, :email)");
    $statement -> bindValue(":nim", $nim);
    $statement -> bindValue(":nama", $nama);
    $statement -> bindValue(":tanggal", $tanggal);
    $statement -> bindValue(":alamat", $alamat);
    $statement -> bindValue(":nohp", $no_hp);
    $statement -> bindValue(":email", $email);
    $result = $statement -> execute();
}
catch (exception $e) {
    $result['error'] = $e -> getMessage();
    echo json_encode($result);
    http_response_code(400);
    exit(0);
}

header('Content-Type: application/json');
echo json_encode($result);