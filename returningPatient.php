<?php
include('connectToDatabase.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          if (isset($_POST['userId']) && isset($_POST['fullName']) && isset($_POST['phoneNumber'])) {
                    $userId = $_REQUEST['userId'];
                    $fullName = $_REQUEST['fullName'];
                    $phoneNumber = $_REQUEST['phoneNumber'];
          }
          if (empty($_POST['userId'])) {
                    echo "Empty Fields in Login Field";
                    header('location: returningPatient.html');
                    exit;
          }
} else {
          echo "Error while Processing Data";
}

$checkUserId = "SELECT * FROM userLogin WHERE userId = \"$userId\" AND fullName = \"$fullName\" AND phoneNumber = \"$phoneNumber\"";
$result = mysqli_query($connection, $checkUserId);
$userIdData = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

<table border="1px" style="border-collapse: collapse;" cellpadding="10px">
          <thead>
                    <th>Id</th>
                    <th>User Id</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
          </thead>
          <tbody>
          <?php
          if (mysqli_num_rows($result) == 0) {
                    echo "No User of Name $fullName and Phone Number $phoneNumber";
          } else {
                    foreach ($userIdData as $individual_data) {
                              echo "
                                       <tr>
                                       <td>{$individual_data['id']}</td>
                                       <td>{$individual_data['userId']}</td>
                                       <td>{$individual_data['fullName']}</td>
                                       <td>{$individual_data['phoneNumber']}</td>
                                       </tr>
                                       ";
                    }
          }
          ?>
          </tbody>
</table>