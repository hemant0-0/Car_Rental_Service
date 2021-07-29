<?php
session_start();
if ($_SESSION['user_name']==true) {

 ?>
<!DOCTYPE html>
<html>
<head>
<title>CRS</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
.maindiv{
  width:70%;
  height:450px;
  position:absolute;
  left: 50%;
  top: 90%;
  transform: translate(-50%,-90%);
  background-size: 100%;
  background-color: #fff;
  box-shadow: 1px 2px 10px white;
}

.container h2{
  font-size: 40px;
  margin-left: 10%;
color: #000;
font: courier;
}

.container p{
  font-size: 30px;
  margin-left: 10%;
  font: courier;
}
</style>
</head>
<body>
<header>
    <div class="main">
	<div class="title">
		<h1>Car Rental Sevices</h1>
</div>
<nav>
<ul>
  <li><a href="homeaul.php">HOME</a></li>
  <li class="active"><a href="aboutaul.php">ABOUT</a></li>
  <li><a href="all_carsaul.php">ALL CARS</a></li>
  <li><a href="userpanel.php">USER PANEL</a></li>
  <li><a href="logout.php">LOGOUT</a></li>
</ul>
</nav>
</div>
<div class="maindiv">
  <div class="container">
</div>
</div>
</body>
</html>
<?php
}
else {
  header('location:index.php');
}
 ?>
