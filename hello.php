<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="icon" href="country.png" />
  <!-- <script src="video.js"></script> -->
	<style>
	* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
  font-size: 17px;
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

#content {
  position: absolute;
  padding: 20px;
  right:400px;
}

#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}
#myBtn:hover {
  background: #ddd;
  color: black;
}

	</style>
</head>
<body>
<video autoplay muted loop id="myVideo">
  <source src="videos/space.mp4" >
  Your browser does not support HTML5 video.
  
</video>
<div  id = "content">
<!-- <button id="myBtn" onclick="myFunction()">Pause</button> -->
    <?php
include_once "action.php";
include "header.php";
if (isset($_GET['login']) && $_GET['login'] != "") {
	$admin = $_GET['login'];
	if(check_log($admin) == true){
		echo "<h3 style = color:white;>Привет,  $admin!</h3>";
		
	}
	} else {
		header("Location: index.php");
	}
include "content.php";



?>
</div>
</body>
</html>



