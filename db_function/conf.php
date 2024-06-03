<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'ordering_db';

$conn = mysqli_connect($host, $username, $password, $database);

if ($conn->connect_errno) {
    die("Failed to connect to MySQL: " . $conn->connect_error);
}
