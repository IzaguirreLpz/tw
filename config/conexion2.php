<?php
$servername = '127.0.0.1';
$username = "root";
$password = "";
$dbname = "bd_ber";

$paginacion = "mysql:host=$servername;dbname=$dbname;";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>