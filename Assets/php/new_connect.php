<?php
// Database connection details
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "univers";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!<br>";
}

// SQL query to retrieve data from a table (replace 'your_table_name' with the actual table name)
$sql = "SELECT * FROM form";
$result = $conn->query($sql);

// Check if the table has data and display it
if ($result->num_rows > 0) {
    echo "<table border='1'>"; // Create an HTML table
    echo "<tr><th>Column1</th><th>Column2</th><th>Column3</th></tr>";  
    
    // Loop through the rows and display data
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

// Close the connection
$conn->close();
?>