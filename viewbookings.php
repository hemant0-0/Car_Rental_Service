<?php
session_start();
if ($_SESSION['user_name']==true) {
  $conn=mysqli_connect('localhost','root','','crs');
  $username1=$_SESSION['user_name'];
  if (isset($_REQUEST['end'])) {

    $b_id=$_REQUEST['b_id'];
    $c_id=$_REQUEST['c_id'];
    $expired="expired";
    mysqli_query($conn,"update b_cars set status='$expired' where b_id='$b_id'");
}



 ?>
<!DOCTYPE html>
<html>
<head>
<title>CRS</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>

input[type ="submit"]{
  width: auto;
  border:0;
  background: #000;
  display: block;
  margin:auto;
  text-align: center;
  border: 2px solid #000;
  padding: 4px 40px;
  outline: none;
  color:white;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
}

input[type ="submit"]:hover{
  background: #2ecc71;
  border: 2px solid #2ecc71;
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
  <li class="active"><a href="#">VIEW BOOKINGS</a></li>
  <li><a href="update_user.php">UPDATE PROFILE</a></li>
  <li><a href="booking_hist_user.php">BOOKING HISTORY</a></li>
  <li><a href="feedback.php">FEEDBACK</a></li>
</ul>
</div>
<table>
  <tr>
      <th>Booking No.</th>
      <th>Car No.</th>
      <th>Booked Date</th>
      <th>Cancel Booking</th>

  </tr>
<?php
$booked="booked";
$sql="SELECT b_id, c_id, username, booked_date FROM b_cars WHERE status='".$booked."' AND username='$username1' ";
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($result)) {
echo "<tr>
<td>".$row['b_id']."</td>
<td>".$row['c_id']."</td>
<td>".$row['booked_date']."</td>";
?>
<td><form method="post" enctype="multipart/form-data">
<input type="hidden" name="b_id" value="<?php echo $row["b_id"] ?>">
<input type="hidden" name="c_id" value="<?php echo $row["c_id"] ?>">
<input type="submit" name="end" value="Cancel">
</form></td>
</tr><?php
}
  echo "</table>";
?>
</table>

</body>
</html>
<?php
}
else {
  header('location:index.php');
}
 ?>
