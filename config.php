<?php
$servername = "localhost";
$username = "admin";
$password = "admin123";
$dbname = "artesanos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
