<?php
include '../koneksi.php';
header('Content-Type: application/json');

/**
 * @var $connection PDO
 */

$nim = $_POST['nim'] ?? '';
$kodemk = $_POST['kode_mk'] ?? '';

try {
    $statement = $connection -> prepare("SELECT * FROM `ambilmk` WHERE `nim` = :nim AND `kode_mk` = :kodemk");
    $statement -> bindValue(':nim', $nim);
    $statement -> bindValue(":kodemk", $kodemk);
    $statement -> execute();
    $row = $statement -> rowCount();
    if ($row === 0) {
        $result['error'] = 'Data tidak ditemukan';
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
    $statement = $connection -> prepare("DELETE FROM `ambilmk` WHERE `nim` = :nim AND `kode_mk` = :kodemk");
    $statement -> bindValue(':nim', $nim);
    $statement -> bindValue(":kodemk", $kodemk);
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