<?php
$host = 'localhost';
$db = 'student -affairs';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    echo "تم الاتصال بنجاح";
} catch (PDOException $e) {
    echo "فشل الاتصال: " . $e->getMessage();
}
?>