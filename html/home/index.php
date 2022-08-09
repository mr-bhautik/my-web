<?php 
if($_COOKIE['authanticate'] != True || $_COOKIE['user'] == null){
  header("location: /login");

}


?>

<html>
<head>
<title>Home</title>
 <style media="screen">

body { 
  background-image:url(/images/background.jpg);
  
}
h1{
  color: lightgreen;
}
#title {
  color: white;
}


ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: #ddd;
  color: black;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 130px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  top: 49px;
  right: 0px;

}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
  
}

.dropdown-content a:hover {background-color: lightgreen ;}

.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown {
  position: absolute;
  top: 8px;
  right: 8px;
}
.img {
  position: absolute;
  height: 47.5px;
  width: 50px;
  top: 0px;
  right: 0px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.dropdown-content .lout:hover {
  background-color: red  ;

}



</style>
<script>

</script>

</head>
<body>
  <ul>
  <li><a title="index page" href="/">index</a></li>
  <li><a title="upload video" href="/home/uploads/">Upload</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn"><img class="img" src="/images/person_icon.png"></a>
    <div class="dropdown-content">
      <a title="about you" href="/profile/">Profile</a>
      <a title="edit your profile" href="/profile/edit/">edit profile</a>
      <a title="logout" class="lout" href="/logout/">Logout</a>
    </div>
  </li>
</ul>
<br>
<?php echo "<center><h1>Welcome <u>" . $_COOKIE['user'] . "</u> on Home page </h1></center>"; ?>

<br>

</body>
</html>

<?php

//mysql information
$servername = "localhost";
$username = "kali";
$password = "kali";
$dbname = "videos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//get data from mysql
$sql = "SELECT thumbnail , video ,title FROM video";
$result = $conn->query($sql);

//fetch data
if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    echo '<pre>';
  echo '<video width="500" height="300" poster='.$row['thumbnail'].' id="player" playsinline controls>';
  echo '<source src=' . $row['video'] . ' type="video/mp4">';
  echo '</video>';
  echo '<h2 id="title">' . $row['title'] . '</h2>';
  echo '<h3>' . $row['submit_date']. '</h3>';
  echo '</pre>';
    
  }

}

//close connection
$conn->close();

?>