<style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    form {
      margin-bottom: 16px;
    }
    input[type=text] {
      padding: 8px;
      width: 250px;
    }
    input[type=submit] {
      padding: 8px 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    input[type=submit]:hover {
      background-color: #45a049;
    }
    .delete-btn {
      background-color: #f44336;
    }
    .update-btn {
      background-color: #ff9800;
    }
  </style>
<h2>Update User</h2>
    <form method="POST" action="adminPanel.php">
         <label>ID:</label>
        <input type="text" name="id">
    
        <label>User ID:</label>
        <input type="text" name="userId">

        <label>Full Name:</label>
        <input type="text" name="fullName">

        <label>Phone Number:</label>
        <input type="text" name="phoneNumber"><br> <br>

        <input type="submit" value="Update" style="float: right; margin-right: 70px;">
    </form>