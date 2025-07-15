<?php
$host = "ep-purple-forest-a2rclqki.eu-central-1.pg.koyeb.app";
$dbname = "koyebdb";
$user = "koyeb-adm";
$password = "npg_CrP9Sktf7FqV";

try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
