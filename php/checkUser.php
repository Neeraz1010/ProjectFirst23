<?php
include 'connectToDatabase.php';

// Get the user ID from the form input
$userId = $_POST['userId'];

// Prepare the SQL query to check if the user ID exists in the userLogin table
$query = "SELECT * FROM userLogin WHERE userId = '$userId'";
$result = mysqli_query($connection, $query);

if ($result) {
          // User ID exists in the userLogin table
          if ($row = mysqli_fetch_assoc($result)) {
                    $roleId = $row['role'];

                    // Prepare the SQL query to retrieve the role name based on the role ID
                    $roleQuery = "SELECT * FROM role WHERE roleId = '$roleId'";
                    $roleResult = mysqli_query($connection, $roleQuery);

                    if ($roleResult) {
                              if ($roleRow = mysqli_fetch_assoc($roleResult)) {
                                        $roleName = $roleRow['roleName'];

                                        // Redirect the user based on the role
                                        if ($roleName == 'user') {
                                                  header("Location: ../home.html");
                                                  exit;
                                        } elseif ($roleName == 'admin') {
                                                  header("Location: ../php/adminPanel.php");
                                                  exit;
                                        }
                              }
                              else {
                                        // User ID does not exist
                                        header("Location: ../errorUserCheck.html");
                                        exit;
                                    }
                    }
          }
}

// If the user ID doesn't exist or an error occurred, redirect to an error page or display an error message
header("Location: ../errorUserCheck.html");
exit;
?>