<html>
<head>
<title><?php echo $_COOKIE['user']; ?>: Profile</title>
<style>
	.icon {
		display: block;
		margin-left: auto;
		margin-right: auto;
		margin-top: 75px;
		width: 25%;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

	}
	#usrn {
		color: #008CBA;
		position: absolute;
		left: 36.5%;
		top: 50%;
		text-shadow: 1px 1px 2px #FF0000;
	}
	#pro {
		position: absolute;
		bottom: 10px;
		right: 8px;
		text-decoration: none;
		background-color: white;
		color: #4CAF50;
		display: inline-block;
		padding: 15px 10px;
		border-radius: 10px;
		transition-duration: 0.4s;
		border: 3px solid #4CAF50;
		

	}
	#pro:hover {
		background-color: #4CAF50;
		color: white;
	}
	#nev {
        position: fixed;
        overflow: hidden;
        background-color: #333;
        width: 100%;
        top: 0px;
        right: 1px;

    }
    #nev a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    #nev a:hover {
        background-color: #ddd;
        color: black;
    }
    #hom {
        background-color: #04AA6D;
    }


</style>
</head>
<body>
	<img class="icon" src="/images/person_icon.png">
	<h2 id="usrn">User name: <?php echo $_COOKIE['user']; ?> <h2>
	<a title="Edit your profile" id="pro" href="/profile/edit">edit profile</a>
	<div id="nev">
     
     
     <a title="home" id="hom" href="/home">Home</a>

     </div>

</body>
</html>
