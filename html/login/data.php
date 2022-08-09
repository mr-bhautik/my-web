 <?php
$user = $_POST["user"];
$pas = $_POST["pass"];

$servername = "localhost";
$username = "kali";
$password = "kali";
$dbname = "logins";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT password FROM logins WHERE user_name='$user'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $pass= $row["password"];
  }
} else {
       echo "wrong username or password";
}
$conn->close();
if ($pass == $pas){
    header("location: /home");
    

}
elseif ($pass == null){
     echo "no entry anything";
}
else {
 	echo "no username or password found";
}
?>

