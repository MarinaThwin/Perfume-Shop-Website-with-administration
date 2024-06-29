<?php
$servername = "localhost";
$username = "tommy";
$password = "zayarhtoo9";
$dbname = "cassia";

// Create connection
$conn=mysqli_connect('localhost','root','','cassia');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Change admin password
$new_password = "new_password";
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
$sql = "UPDATE user SET password = '$hashed_password' WHERE username = 'user'";

if ($conn->query($sql) === TRUE) {
  echo "Admin password changed successfully";
} else {
  echo "Error changing admin password: " . $conn->error;
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Settings</title>
</head>
<body>
  <h1>Admin Settings</h1>
  <form action="userlist.php" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?php echo $username; ?>" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br>
    <button type="submit">Save Changes</button>
  </form>
</body>
</html>