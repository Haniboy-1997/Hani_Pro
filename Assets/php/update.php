<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "univers";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Data to be updated
$id = 21; // ID of the row to update
$new_value = "hani@gmail.com";

$sql = "UPDATE form SET email='$new_value' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Data updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>