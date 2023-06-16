<?php
include 'connectToDatabase.php';
// Assuming you have already established a database connection

// Fetching user data based on userId
$userId = $_POST['userId']; // Assuming the userId is submitted via a form
$query = "SELECT * FROM userLogin WHERE userId = '$userId'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $fullName = $row['fullName'];
          $phoneNumber = $row['phoneNumber'];

          // Redirecting to home.html
          header("Location: ../home.html");
          exit();
} else {
          // User not found, display error message
          echo "User not found.";
}
?>
