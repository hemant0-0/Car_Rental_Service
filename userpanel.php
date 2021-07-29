<?php
session_start();
if ($_SESSION['user_name']==true) {
  $conn=mysqli_connect('localhost','root','','crs');
  $username1=$_SESSION['user_name'];
  $sql="select * from user where u_name='$username1'";
  $result=mysqli_query($conn,$sql);

 ?>
<!DOCTYPE html>
<html>
<head>
<title>CRS</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
.container{
   display: inline-block;
   float: left;
}

</style>
</head>
<body>
<header>
<h1>Car Rental Services</h1>

<nav>
<ul>
<li><a href="homeaul.php">HOME</a></li>
<li><a href="aboutaul.php">ABOUT</a></li>
<li><a href="all_carsaul.php">ALL CARS</a></li>
<li class="active"><a href="userpanel.php">USER PANEL</a></li>
<li><a href="logout.php">LOGOUT</a></li>
</ul>
</nav>
</div>
<div class="container">

<div class="wrapper">
  <ul>
  <li class="active"><a href="#">USER PROFILE</a></li>
  <li><a href="viewbookings.php">VIEW BOOKINGS</a></li>
  <li><a href="update_user.php">UPDATE PROFILE</a></li>
  <li><a href="booking_hist_user.php">BOOKING HISTORY</a></li>
  <li><a href="feedback.php">FEEDBACK</a></li>
</ul>
</div>
<?php
while ($row=mysqli_fetch_array($result)) {
 ?>

<table>
      <tr><td class="small">Name</td><td><?php echo $row['name'] ?></td></tr>
      <tr><td class="small">Mobile No</td><td><?php echo $row['mob_no'] ?></td></tr>
      <tr><td class="small">Email</td><td><?php echo $row['email'] ?></td></tr>
      <tr><td class="small">Address</td><td><?php echo $row['addr'] ?></td></tr>
      <tr><td class="small">Username</td><td><?php echo $row['u_name'] ?></td></tr>
      <tr><td class="small">Password</td><td><?php echo $row['pass'] ?></td></tr>
</table>

<?php
}
 ?>

</div>
</body>
</html>
<?php
}
else {
  header('location:index.php');
}
 ?>
