<?php 
if($_COOKIE['authanticate'] != True){
  header("location: /login");
}
?>

<html>
<head>
<title> file upload </title>
<style>
input[type=submit]{
    margin-top: 50px;
    width: 15%;
    background-color: lightgreen;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
input[type=file]{
    position: center;
    }
</style>
</head>
<body >
<form action="" method="post" enctype="multipart/form-data">
<pre>
<lable><b>video:</b><lable>

<input type="file" name="video" required>
<lable><b>video title:</b><lable>                         <input type="submit" name="submit" value="upload video">
<input type="text" name="title" required> 




<lable><b>video thumbnail:</b><lable>

<input type="file" name="thumbnail">



</pre>
</form>
</body>
</html>

<?php

if(isset($_POST['submit'])){

    //mysql details
    $servername = "localhost";
    $username = "kali";
    $password = "kali";
    $dbname = "videos";

    //for video
    $target_video_dir = "/home/uploads/videos/";

    //for thumbnail
    $target_thumbnail_dir = "/home/uploads/thumbnails/";
    echo 'hello';
    
    //get title
    $title= $_POST['title'];
    
    //get video details
    $video_name = $_FILES['video']['name'];
    $video_tmp =$_FILES['video']['tmp_name'];
    $video_size =$_FILES['video']['size'];
    $video_type=$_FILES['video']['type'];
    
    //get image details
    $thumbnail_name = $_FILES['thumbnail']['name'];
    $thumbnail_tmp =$_FILES['thumbnail']['tmp_name'];
    $thumbnail_size =$_FILES['thumbnail']['size'];
    $thumbnail_type=$_FILES['thumbnail']['type'];

   
    //connect to mysql
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }
   
    //insert data into mysql
    $sql = "INSERT INTO video (title, video, thumbnail, submit_date) VALUES ('$title', '$target_video_dir$video_name', '$target_thumbnail_dir$thumbnail_name', now())";
    
    if(move_uploaded_file($video_tmp,"videos/".$video_name)){
        echo '<p style="color:green;">Successfully video uploaded</p>';
        if($mysqli->query($sql) === true){
            echo '<p style="color:green;">Records inserted successfully.</p>';
        }
        else{
           echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
        } 
    }
    else{
        echo '<p style="color:red;">video is not uploaded</p>';
    }
    if(move_uploaded_file($thumbnail_tmp,"thumbnails/".$thumbnail_name)){
        echo '<p style="color:green;">Successfully thumbnail uploaded</p>';
    }
    else{
        echo '<p style="color:red;">thumbnail is not uploaded</p>';
    }
    
    //close connection
    $mysqli->close();

}


?>
