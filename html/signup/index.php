<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <title>sign up</title>
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -80px;
    bottom: -80px;
}
form{
    height: 680px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}

input[type=submit]{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form name="Register" method="post" action="">
        <h3>Sign up</h3>
        <label for="username">Your Name</label>
        <input type="text" placeholder="Enter name" name="fullname">

        <label for="username">Username</label>
        <input type="text" placeholder="Enter Username" name="user">

        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password" name="pass">

        <label for="password">Retype Password</label>
        <input type="password" placeholder="Retype Password" name="repass">

        <input type="submit" name="submit" value="Signup">
        <br>
        <a href="/login">alerady have account</a>
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    if(empty(trim($_POST['fullname']))){
        echo "<center><p style='color:red'>please enter your name</p></center>";
    }
    elseif (empty(trim($_POST['user']))){
        echo "<center><p style='color:red'>please enter username</p></center>";
        
    }
    elseif (empty(trim($_POST['pass']))) {
        echo "<center><p style='color:red'>please enter password</p></center>";
        
    }
    elseif ($_POST['pass'] != $_POST['repass']) {
        echo "<center><p style='color:red'>password dose not match</p></center";
    }

    else {
        //get data from htttp form
        $fullname = $_POST["fullname"];
        $user = $_POST["user"];
        $pass = $_POST["pass"];

        //mysql details
        $servername = "localhost";
        $username = "kali";
        $password = "kali";
        $dbname = "logins";

        $mysqli = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if($mysqli === false){
            die("ERROR: Could not connect. " . $mysqli->connect_error);
        }
        
        $sql = "INSERT INTO logins (full_name, user_name, password, image, submission_date) VALUES ('$fullname', '$user', '$pass', '', now())";

        if($mysqli->query($sql) === true){
            echo "<p style='color:green'><center>Signup successfully.</center></p>";
            header("location: /login");
        } else{
            echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
        }
         
        // Close connection
        $mysqli->close();

        }


}

?>