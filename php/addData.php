<?php
include 'connectToDatabase.php';

// Check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Validate and sanitize user input
$userId = mysqli_real_escape_string($connection, $_POST['userId']);
$fullName = mysqli_real_escape_string($connection, $_POST['fullName']);
$phoneNumber = mysqli_real_escape_string($connection, $_POST['phoneNumber']);

// Insert data into the "userLogin" table
$insertQuery = "INSERT INTO userLogin (userId, fullName, phoneNumber) VALUES ('$userId', '$fullName', '$phoneNumber')";

if (!mysqli_query($connection, $insertQuery)) {
    echo "Error: " . mysqli_error($connection);
} else {
    header('location: adminPanel.php');
}

// Close the database connection
mysqli_close($connection);
?>
