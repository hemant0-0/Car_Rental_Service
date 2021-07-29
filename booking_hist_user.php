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
  <li class="active"><a href="#">BOOKING HISTORY</a></li>
  <li><a href="feedback.php">FEEDBACK</a></li>
</ul>
</div>
<table>
  <tr>
      <th>Booking ID</th>
      <th>Car ID</th>
      <th>User ID</th>
      <th>Booked Date</th>
      <th>Status</th>

  </tr>
<?php
$sql="SELECT b_id, c_id, username, booked_date, status FROM b_cars WHERE username='$username1'";
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($result)) {
echo "<tr>
<td>".$row['b_id']."</td>
<td>".$row['c_id']."</td>
<td>".$row['username']."</td>
<td>".$row['booked_date']."</td>
<td>".$row['status']."</td>";

?>
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
