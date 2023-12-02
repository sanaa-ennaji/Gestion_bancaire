<?php
$host = 'localhost';
$username = 'root';
$password = 'new_password';
$databaseName = 'gestionBancaire';

$conn = mysqli_connect($host, $username, $password, $databaseName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $sql = "SELECT * FROM clients";
// $result = $conn->query($sql);
?>