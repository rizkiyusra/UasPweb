<?php
include '../koneksi.php';
header('Content-Type: application/json');

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
    $statement = $connection -> prepare("SELECT * FROM `matakuliah` WHERE `kode_mk` = :kodemk");
    $statement -> bindValue(":kodemk", $kodemk);
    $statement -> execute();
    $row = $statement -> rowCount();
    if ($row === 0) {
        $result['error'] = 'Data tidak ditemukan kode_mk '.$kodemk;
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
    $statement = $connection -> prepare("UPDATE `matakuliah` SET `nama_mk` = :namamk, `sks` = :sks, `semester` = :semester, `program_studi` = :programstudi, `keterangan` = :keterangan WHERE `kode_mk` = :kodemk");
    $statement -> bindValue(":kodemk", $kodemk);
    $statement -> bindValue(":namamk", $namamk);
    $statement -> bindValue(":sks", $sks);
    $statement -> bindValue(":semester", $semester);
    $statement -> bindValue(":programstudi", $programstudi);
    $statement -> bindValue(":keterangan", $keterangan);
    $execute = $statement -> execute();
    if(!$execute){
        $result['error'] = $statement->errorInfo();
        echo json_encode($result);
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