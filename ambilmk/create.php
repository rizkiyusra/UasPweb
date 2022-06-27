<?php
include_once '../koneksi.php';

/**
 * @var $connection PDO
 */

$nim = $_POST['nim'] ?? '';
$kodemk = $_POST['kode_mk'] ?? '';
$thajaran = $_POST['tahun_ajaran'] ?? '';
$ruangan = $_POST['ruangan'] ?? '';
$hari = $_POST['hari'] ?? '';

try {
    $statement = $connection -> prepare("INSERT INTO `ambilmk` (`nim`, `kode_mk`, `tahun_ajaran`, `ruangan`, `hari`, `tgl_ambilmk`) VALUES (:nim, :kodemk, :thajaran, :ruangan, :hari, default)");
    $statement -> bindValue(":nim", $nim);
    $statement -> bindValue(":kodemk", $kodemk);
    $statement -> bindValue(":thajaran", $thajaran);
    $statement -> bindValue(":ruangan", $ruangan);
    $statement -> bindValue(":hari", $hari);
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