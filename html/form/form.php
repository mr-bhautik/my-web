 <html>
<body>

<?php
$user = $_POST["txt"];
$pass = $_POST["pass"];

$servername = "localhost";
$username = "kali";
$password = "kali";
$dbname = "first_database";

    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO first_database VALUES ('$user', '$pass')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>


</body>
</html>
