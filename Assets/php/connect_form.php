<?php 
    // Create variables to accept and save the user data coming from the HTML form
    $name_variable = $_POST['name']; 
    $email_variable = $_POST['email']; 
    $phone_variable = $_POST['phone']; 
    $message_variable = $_POST['message'];

// Connecting to Database 
$conn = new mysqli("localhost","root","","univers");

// Check if the connection has an error
if($conn->connect_error){
    // Display error
    echo "Could not connect to the database";
    die('Connection Failed : '.$conn->connect_error);
} else {
    $sql_statement = $conn->prepare("INSERT INTO form (name, email, phone, message) 
        VALUES (?, ?, ?, ?)");
    $sql_statement->bind_param("ssis", $name_variable, $email_variable, $phone_variable, $message_variable);

    // Execute the SQL statement
    $sql_statement->execute();
    echo "Message sent Successfully";

    $sql_statement->close();
    $conn->close();
}
?>