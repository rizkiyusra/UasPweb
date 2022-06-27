<?php

include '../koneksi.php';

/**
 * @var $connection PDO
 */

try {
    $statement = $connection -> query("SELECT * FROM ambilmk");
    $statement -> setFetchMode(PDO::FETCH_ASSOC);
    $result = $statement -> fetchAll();
}
catch (Exception $e) {
    $result['error'] = $e -> getMessage();
    echo json_encode($result);
    http_response_code(400);
    exit(0);
}
header('Content-Type: application/json');
$data['data'] = $result;
echo json_encode($data);