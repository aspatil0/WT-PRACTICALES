<?php
$servername = "localhost";
$username = "root"; // Default WAMP MySQL username
$password = ""; // No password by default
$dbname = "my_database"; // Use your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
