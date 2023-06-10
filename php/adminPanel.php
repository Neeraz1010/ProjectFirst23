
<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    a {
      text-decoration: none;
      color: #019BA9;
      transition: color 0.2s ease;
    }
    a:hover {
      color: blue;
    }
    th, td {
      padding: 8px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }
    form {
      margin-bottom: 16px;
    }
    .delete-btn {
      background-color: #f44336;
    }
    .update-btn {
      background-color: #ff9800;
    }
  </style>
</head>
<body>
  <h1 align="center">Admin Panel</h1>
  <hr>
  <form method="post" action="addData.php" class="inputForm">

    <h1>Add</h1>
    <div>
      User Id :
      <input type="text" name="userId" id="" placeholder="User Id given by Hospital">
      
      Full Name :
      <input type="text" name="fullName" id="" placeholder="Full Name">
      
      Phone Number :
      <input type="tel" name="phoneNumber" id="" placeholder="Phone Number">
      <button type="submit">Add</button>
      
    </div>
  </form><br><br><br>
  <!-- Display Table -->
  <table>
    <tr>
      <th>Id</th>
      <th>User Id</th>
      <th>Full Name</th>
      <th>Phone Number</th>
      <th>Actions</th>
    </tr>
    <?php
    include 'connectToDatabase.php';

    // Retrieve data from the "userLogin" table
    $selectQuerry = "SELECT * FROM userLogin";
    $result = $connection->query($selectQuerry);
    $data = mysqli_fetch_all($result);
    if ($result->num_rows > 0) {
      foreach ($data as $individual_data) {
        echo "
        <tr>
                  <td>{$individual_data[0]}</td>
                  <td>{$individual_data[1]}</td>
                  <td>{$individual_data[2]}</td>
                  <td>{$individual_data[3]}</td>
                  <td><a href='deleteData.php?id=$individual_data[0]&userId=$individual_data[1]&fullName=$individual_data[2]&phoneNumber=$individual_data[3]'>Delete</a>
                  </tr>
                  ";
      }
      echo
        "
        <tr>
        <td colspan='5'><a href='editData.php?id=$individual_data[0]&userId=$individual_data[1]&fullName=$individual_data[2]&phoneNumber=$individual_data[3]'>Edit Data</a></td>
        </tr>
        ";
    } else {
      echo "<tr><td colspan='5'>No data found.</td></tr>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Validate and sanitize user input
      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $userId = mysqli_real_escape_string($connection, $_POST['userId']);
      $fullName = mysqli_real_escape_string($connection, $_POST['fullName']);
      $phoneNumber = mysqli_real_escape_string($connection, $_POST['phoneNumber']);

      // Update the data in the "userLogin" table
      $editQuery = "UPDATE userLogin SET userId='$userId', fullName='$fullName', phoneNumber='$phoneNumber' WHERE id='$id'";

      if (!mysqli_query($connection, $editQuery)) {
        echo "Error: " . mysqli_error($connection);
      } else {
        // Redirect back to the admin panel or a success page
        header("Location: adminPanel.php");
        exit();
      }
    }

    // Close the database connection
    $connection->close();
    ?>
  </table>
</body>
</html>
