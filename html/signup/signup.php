<?php


//mysql details
$servername = "localhost";
$username = "kali";
$password = "kali";
$dbname = "logins";

//make mysql connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
$sql = "INSERT INTO logins (full_name, user_name, password, image) VALUES ('mahesh', 'mahesh123', 'passwd', '')";

if($mysqli->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();

?>