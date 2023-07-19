<?php

// Replace these credentials with your own
$servername = "localhost";  // Server where your MySQL database is hosted
$username = "root";  // Your MySQL username
$password = "";  // Your MySQL password
$dbname = "ponto";    // Your MySQL database name

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>