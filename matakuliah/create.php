<?php
include_once '../koneksi.php';

/**
 * @var $connection PDO
 */

$kodemk = $_POST['kode_mk'] ?? '';
$namamk = $_POST['nama_mk'] ?? '';
$sks = $_POST['sks'] ?? '';
$semester = $_POST['semester'] ?? '';
$programstudi = $_POST['program_studi'] ?? '';
$keterangan = $_POST['keterangan'] ?? '';

try {
    $statement = $connection -> prepare("INSERT INTO `matakuliah` (`kode_mk`, `nama_mk`, `sks`, `semester`, `program_studi`, `keterangan`) VALUES (:kodemk, :namamk, :sks, :semester, :programstudi, :keterangan)");
    $statement -> bindValue(":kodemk", $kodemk);
    $statement -> bindValue(":namamk", $namamk);
    $statement -> bindValue(":sks", $sks);
    $statement -> bindValue(":semester", $semester);
    $statement -> bindValue(":programstudi", $programstudi);
    $statement -> bindValue(":keterangan", $keterangan);
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