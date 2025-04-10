<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Create variables to accept and save the user data coming from the HTML form
    $name_variable = $_POST['name']; 
    $email_variable = $_POST['email']; 
    $phone_variable = $_POST['phone']; 
    $message_variable = $_POST['message'];

} else {
    // If there is no user information to display - return to the form page
    header("Location: new_form.html");
    exit();
}

// Connecting to Database 
$conn = new mysqli("localhost","root","","univers");

// Check if the connection has an error
if($conn->connect_error){
    // Display error
    echo "Could not connect to the database";
    die('Connection Failed : '.$conn->connect_error);
} else {
    
    $sql_statement = $conn->prepare("INSERT INTO form (Name, Email, phone, Message) VALUES (?, ?, ?, ?)");
    $sql_statement->bind_param("ssss", $name_variable, $email_variable, $phone_variable, $message_variable);

    // Execute the SQL statement
    $sql_statement->execute();
    // Display the message to tell users that the form is sent successfully to the database
    echo "Message sent Successfully";

    $sql_statement->close();
    $conn->close();
}
?>