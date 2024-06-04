<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'ordering_db';

date_default_timezone_set('Asia/Manila');

$conn = mysqli_connect($host, $username, $password, $database);

if ($conn->connect_errno) {
    die("Failed to connect to MySQL: " . $conn->connect_error);
}
