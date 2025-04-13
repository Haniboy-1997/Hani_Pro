<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "univers";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Data to insert
$name = "Hani Weldemichael Kesete";
$email = "Hani@gmail.com";
$phone = "+251937373149";
$message = "The first data and comment inserted";


$stmt = $conn->prepare("INSERT INTO form (name, email, phone, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $phone, $message); 

if ($stmt->execute()) {
    echo "Data recorded successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>