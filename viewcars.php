<?php
session_start();
if ($_SESSION['user_name']==true) {
  $conn=mysqli_connect('localhost','root','','crs');
 ?>
<!DOCTYPE html>
<html>
<head>
<title>CRS</title>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<style>
h1{
  margin-top:10px;
  margin-left:32%;
  color: #FF5733;
  font-size: 50px;
  font: tisa;
  width:100%;
}
</style>
</head>
<body>
<div class="wrapper1">
<div class="sidebar">
<ul>
<h2>ADMIN PANEL</h2>
<li><a href="adminpanel.php">HOME</a></li>
<li class="active"><a href="viewcars.php">VIEW CARS</a></li>
<li><a href="bookings.php">CHECK BOOKINGS</a></li>
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
  <div class="header"><h1>Car Rental System</h1></div>
  <table>
    <tr>
        <th>CarNo</th>
        <th>Picture</th>
        <th>Name</th>
        <th>Description</th>
        <th>City</th>
        <th>Budget</th>
    </tr>
<?php
$sql="SELECT id, image, c_name, text, city, budget FROM CARS";
$result=mysqli_query($conn,$sql);

while ($row=mysqli_fetch_array($result)) {
echo "<tr>
  <td>".$row['id']."</td>
  <td><img src='images/".$row['image']."' width=120px height=120px ></td>
  <td>".$row['c_name']."</td>
  <td>".$row['text']."</td>
  <td>".$row['city']."</td>
  <td>".$row['budget']."</td>
  </tr>
";
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
