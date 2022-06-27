<?php
include '../koneksi.php';
header('Content-Type: application/json');

/**
 * @var $connection PDO
 */

$nim = $_POST['nim'] ?? '';

try {
    $statement = $connection -> prepare("SELECT * FROM `mahasiswa` WHERE `nim` = :nim");
    $statement -> bindValue(":nim", $nim);
    $statement -> execute();
    $row = $statement -> rowCount();
    if ($row === 0) {
        $result['error'] = 'Data tidak ditemukan nim '.$nim;
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
    $statement = $connection -> prepare("DELETE FROM `mahasiswa` WHERE `nim` = :nim");
    $statement -> bindValue(":nim", $nim);
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