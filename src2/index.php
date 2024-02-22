<?php
header('Content-Type: application/json');

$host = $_ENV['MYSQL_HOST'];
$db = $_ENV['MYSQL_DATABASE'];
$user = $_ENV['MYSQL_USER'];
$pass = $_ENV['MYSQL_PASSWORD'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$stmt = $pdo->query('SELECT * FROM books');
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(
    ['server' => 'Server 2', 'books' => $data]
);
