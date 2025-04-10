<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "univers";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect data from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO form new_form  VALUES ('$name', '$email', '$phone','$message)";

    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully!";
    } else {
        echo "not connected: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>