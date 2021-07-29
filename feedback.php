<?php
session_start();
if ($_SESSION['user_name']==true) {
  $conn=mysqli_connect('localhost','root','','crs');
  $username1=$_SESSION['user_name'];
 ?>
<!DOCTYPE html>
<html>
<head>
<title>CRS</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>

.loginbox{
  width:500px;
  height:450px;
  background: #fff;
  color: #000;
  top:90%;
  left:50%;
  border: 2px solid #dc143c;
  border-radius: 1px;
  position: absolute;
  transform:translate(-50%,-90%);
  box-sizing: border-box;
  padding: 70px 30px;
}

h2{
  margin: 0;
  padding: 0 0 10px;
text-align: center;
font-size: 30px;
font-weight: 600;
text-transform: uppercase;
}

.loginbox p{
  margin: 0;
  padding: 0;
  font-weight: bold;

}

.loginbox input{
  width:100%;
  margin-bottom: 20px;


}

.loginbox textarea
{
  border:0;
   background: none;
   display: block;;
   margin:30px auto;
   font-size: 17px;
   text-align: center;
   border: 2px solid #DC143C;
   padding: 14px 10px;
   width: 300px;
   outline: none;
   height: 150px;
   color:#fff;
   border-radius: 1px;
   transition: 0.25s;
}

.loginbox textarea:focus{
  width: 280px;
  border-color: #2ecc71;
}

.loginbox input[type ="Submit"]{
  width: 30%;
  border:0;
  background: none;
  display: block;;
  margin:20px auto;
  text-align: center;
  background: #fff;
  border: 2px solid #DC143C;
  padding: 14px 40px;
  outline: none;
  color: #DC143C;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
}

.loginbox input[type ="Submit"]:hover{
  background: #DC143C;
  border: 2px solid #DC143C;
  color: #fff;
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
<li><a href="homeaul.php">HOME</a></li>
<li><a href="aboutaul.php">ABOUT</a></li>
<li><a href="all_carsaul.php">ALL CARS</a></li>
<li class="active"><a href="userpanel.php">USER PANEL</a></li>
<li><a href="logout.php">LOGOUT</a></li>
</ul>
</nav>
</div>
<div class="wrapper">
  <ul>
  <li><a href="userpanel.php">USER PROFILE</a></li>
  <li><a href="viewbookings.php">VIEW BOOKINGS</a></li>
  <li><a href="update_user.php">UPDATE PROFILE</a></li>
  <li><a href="booking_hist_user.php">BOOKING HISTORY</a></li>
  <li class="active"><a href="feedback.php">FEEDBACK</a></li>
</ul>
</div>
<div class="loginbox">
    <h2>feedback</h2>
    <form action="" method="post">
      <textarea name="feed" placeholder="type feedback" value="" required></textarea>
      <input type="submit" name="submit" value="SUBMIT"><br>
  </form>
  </div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
  $user=$_SESSION['user_name'];
  $feed=$_POST['feed'];
  $sql1="INSERT INTO feedback(u_name, feedback) VALUES ('$user','$feed')";
  mysqli_query($conn,$sql1);
  echo "<center>Feedback submitted successfully</center>";
}
}

else {
  header('location:index.php');
}
 ?>
