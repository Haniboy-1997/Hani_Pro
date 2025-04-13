<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "univers";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email, phone, message FROM form";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>List Data</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        h2 {
            text-align: left;
            color:red;
            font-size: 50px;
        }
        th, td {
            border: 3px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color:rgb(201, 196, 196);
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Here is contents in the database</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>" . htmlspecialchars($row['email']) . "</td>
                        <td>" . htmlspecialchars($row['phone']) . "</td>
                        <td>" . htmlspecialchars($row['message']) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>