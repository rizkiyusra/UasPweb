<?php
include '../koneksi.php';
header('Content-Type: application/json');

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
    $statement = $connection -> prepare("SELECT * FROM `mahasiswa` WHERE `nim` = :nim");
    $statement -> bindValue(":nim", $nim);
    $statement -> execute();
    $row = $statement -> rowCount();
    if ($row === 0) {
        $result['error'] = 'Data tidak ditemukan kode_mk '.$nim;
        echo json_encode($result);
        http_response_code(400);
        exit(0);
    }
}
catch (Exception $e) {
    $result['error'] = $e -> getMessage();
    echo json_encode($result);
    http_response_code(400);
    exit(0);
}

try {
    $statement = $connection -> prepare("UPDATE `mahasiswa` SET `nama` = :nama, `tgl_lahir` = :tanggal, `alamat` = :alamat, `no_hp` = :nohp, `email` = :email WHERE `nim` = :nim");
    $statement -> bindValue(":nim", $nim);
    $statement -> bindValue(":nama", $nama);
    $statement -> bindValue(":tanggal", $tanggal);
    $statement -> bindValue(":alamat", $alamat);
    $statement -> bindValue(":nohp", $no_hp);
    $statement -> bindValue(":email", $email);
    $execute = $statement -> execute();
    if(!$execute){
        $reply['error'] = $statement->errorInfo();
        echo json_encode($reply);
        http_response_code(400);
    }
}
catch (Exception $e) {
    $result['error'] = $e -> getMessage();
    echo json_encode($result);
    http_response_code(400);
    exit(0);
}

$result['status'] = $execute;
echo json_encode($result);