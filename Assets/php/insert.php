<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "univers"; 


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!<br>";
}



$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$insert_sql = "INSERT INTO form (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

if ($conn->query($insert_sql) === TRUE) {
    echo "New record inserted successfully!<br>";
} else {
    echo "Error inserting data: " . $conn->error . "<br>";
}

// SQL query to retrieve data from a table (replace 'your_table_name' with the actual table name)
$sql = "SELECT * FROM form";
$result = $conn->query($sql);

// Check if the table has data and display it
if ($result->num_rows > 0) {
    echo "<table border='1'>"; // Create an HTML table
    echo "<tr><th>Column1</th><th>Column2</th><th>Column3</th></tr>";
    
 
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>"; 
        echo "<td>" . $row['email'] . "</td>"; 
        echo "<td>" . $row['phone'] . "</td>"; 
        echo "<td>" . $row['message'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data found in the table.";
}


$conn->close();
?>