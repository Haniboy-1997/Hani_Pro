<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "univers";

$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ID of the record to delete
$idToDelete = 1; // Change this to the actual ID you want to delete

$sql = "DELETE FROM form WHERE id = ?";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Statement preparation failed: " . $conn->error);
}

$stmt->bind_param("i", $idToDelete); 

if ($stmt->execute()) {
    echo "Data deleted successfully.";
} else {
    echo "Data not deleted: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>