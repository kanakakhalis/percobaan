<?php
// config/database.php

$servername = "localhost";
$username = "root"; // Username default XAMPP
$password = ""; // Password default XAMPP kosong
$dbname = "pizzeria_db";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>