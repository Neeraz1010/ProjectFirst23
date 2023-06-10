<?php
$servername = "localhost";
$username = "root";
$password = "root";
$databaseName = "medixoHospital";

$connection = mysqli_connect($servername, $username, $password, $databaseName);

if (!$connection) {
          echo "Error while Connecting to " . $databaseName;
}

?>        