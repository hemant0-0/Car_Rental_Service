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
  width: 100%;
  height: 481px;
  position: inherit;
  background-repeat: no-repeat;
  object-fit: cover;
  background-image: url("css/img/banner.jpg");
  background-size: cover;
}
</style>
</head>
<body>
<header>
    <div class="main">
	<div class="title">
		<h1>Car Rental Services</h1>
</div>
<nav>

<ul>
<li class="active"><a href="#">HOME</a></li>
<li><a href="aboutaul.php">ABOUT</a></li>
<li><a href="all_carsaul.php">ALL CARS</a></li>
<li><a href="userpanel.php">USER PANEL</a></li>
<li><a href="logout.php">LOGOUT</a></li>
</ul>

</nav>
<div class="maindiv">

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
