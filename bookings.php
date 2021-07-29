<?php
session_start();
if ($_SESSION['user_name']==true) {
  $conn=mysqli_connect('localhost','root','','crs');
  if (isset($_REQUEST['end'])) {

    $b_id=$_REQUEST['b_id'];
    $c_id=$_REQUEST['c_id'];
    $avl="available";
    $expired="expired";
    mysqli_query($conn,"update b_cars set status='$expired' where b_id='$b_id'");
    mysqli_query($conn,"update CARS set status='$avl' where id='$c_id'");

  }
 ?>
<!DOCTYPE html>
<html>
<head>
<title>CRS</title>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<style>

input[type ="submit"]{
  width: auto;
  border:0;
  background: #fff;
  display: block;
  margin:20px auto;
  text-align: center;
  border: 2px solid #dc143c;
  padding: 14px 40px;
  outline: none;
  color:#000;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
}

input[type ="submit"]:hover{
  background: #dc143c;
  border: 2px solid #dc143c;
}

</style>
</head>
<body>
<div class="wrapper1">
<div class="sidebar">
<ul>
<h2>ADMIN PANEL</h2>
<li><a href="adminpanel.php">HOME</a></li>
<li><a href="viewcars.php">VIEW CARS</a></li>
<li class="active"><a href="bookings.php">CHECK BOOKINGS</a></li>
<li><a href="add_cars.php">ADD CARS</a></li>
<li><a href="update_cars.php">UPDATE CARS</a></li>
<li><a href="delete_cars.php">REMOVE CARS</a></li>
<li><a href="book_hist.php">BOOKING HISTORY</a></li>
<li><a href="user_details.php">USER DETAILS</a></li>
<li><a href="viewfeedback.php">VIEW FEEDBACK</a></li>
<li><a href="logout.php">LOGOUT</a></li>
</ul>
</div>

<div class="main_content">
  <div class="header"><h1>Car Rental Services</h1></div>
  <table>
    <tr>
        <th>Booking ID</th>
        <th>car ID</th>
        <th>UserName</th>
        <th>Booked Date</th>
        <th>Status</th>
        <th>End Booking</th>

    </tr>
<?php
$booked="booked";
$sql="SELECT b_id, c_id, username, booked_date,status FROM b_cars WHERE status='".$booked."' ";
$result=mysqli_query($conn,$sql);

while ($row=mysqli_fetch_array($result))  {
echo "<tr>
  <td>".$row['b_id']."</td>
  <td>".$row['c_id']."</td>
  <td>".$row['username']."</td>
  <td>".$row['booked_date']."</td>
  <td>".$row['status']."</td>";
  ?>
  <td><form method="post" enctype="multipart/form-data">
  <input type="hidden" name="b_id" value="<?php echo $row["b_id"] ?>">
  <input type="hidden" name="c_id" value="<?php echo $row["c_id"] ?>">
  <input type="submit" name="end" value="END">
  </form></td>
</tr><?php
}
    echo "</table>";
?>
  </table>

</div>
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
