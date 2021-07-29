<?php
session_start();
if ($_SESSION['user_name']==true) {
$conn=mysqli_connect('localhost','root','','crs');
if (isset($_POST['book'])) {
$date=$_POST['date'];
$hallid1=$_POST['id'];
$booked="booked";
$query1="select * from b_cars where c_id='$hallid1' AND booked_date='$date' AND status='$booked'";
$res=mysqli_query($conn,$query1);
$rowcount=mysqli_num_rows($res);
$query2="SELECT * from cars where id='$hallid1' LIMIT 1";
$result=mysqli_query($conn,$query2);
if ($rowcount>=1) {
$msg="Hall is not available at this date click back to return to browse other cars";
}
else{
$user=$_SESSION['user_name'];
$status="booked";
$sql="INSERT INTO b_cars(c_id,username,booked_date,status) VALUES ('$hallid1','$user','$date','$status')";
mysqli_query($conn,$sql);
$msg="Car booked successfully click on bookings to check your bookings";
}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>CRS</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
.maindiv1{
  width:380px;
  height:380px;
  position:absolute;
  left: 5%;
  top: 70%;
  transform: translate(-5%,-70%);
  background-size: 100%;
  background-color: #fff;
  box-shadow: 1px 2px 10px white;
}

.maindiv2{
  width:800px;
  height:380px;
  position:absolute;
  left: 80%;
  top: 70%;
  transform: translate(-80%,-70%);
  background-size: 100%;
  box-shadow: 1px 2px 10px white;
}

table{
  width:800px;
  margin: auto;
  left: 80%;
  top: 52%;
  transform: translate(-80%,-52%);
  border-collapse: collapse;
  text-align: left;
  font-size: 20px;
  table-layout: fixed;
  height: auto;
  color: #fff;
  margin-top: 50px;
  position: absolute;
}
table td{
  width:  auto;
  max-height: 380px;
  margin: auto;
  border-collapse: collapse;
  overflow: hidden;
  text-overflow: ellipsis;
  font-size: 20px;
  background: #fff;
  border: 2px solid #000;
  table-layout: fixed;
  padding: 5px;
  color: #000;
  margin-top: 50px;
  text-decoration: none;
}

table td.small{
  width: 190px;
  max-height: 380px;
  margin: auto;
  border-collapse: collapse;
  overflow: hidden;
  text-overflow: ellipsis;
  font-size: 20px;
  background: #ff5733;
  border: 2px solid #000;
  table-layout: fixed;
  padding: 5px;
  color: #000;
  margin-top: 50px;
  text-decoration: none;
}

input[type ="submit"]{
  width: auto;
  border:0;
  background: #000;
  display: block;
  margin:2px auto;
  text-align: center;
  border: 2px solid #000;
  padding: 14px 80px;
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

input[type="date"]{
  border:0;
   background: black;
   display: block;;
   margin:30px auto;
   font-size: 10px;
   text-align: center;
   border: 2px solid #DC143C;
   padding: 14px 10px;
   width: 100;
   outline: none;
   color:#fff;
   transition: 0.25s;
   border-radius: 12px;
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
  <li><a href="all_carsaul.php">BACK</a></li>
  <li><a href="viewbookings.php">BOOKINGS</a></li>
</ul>
</nav>
</div>
<?php
while ($row=mysqli_fetch_array($result)) {
 ?>
<div class="maindiv1">
<?php
echo "<img src='images/".$row['image']."' width=380px height=380px >";
?>
</div>
<table>
      <tr><td class="small">Hall Name:</td><td><?php echo $row['c_name'] ?></td></tr>
      <tr><td class="small">Description:</td><td><?php echo $row['text'] ?></td></tr>
      <tr><td class="small">Location:</td><td><?php echo $row['city'] ?></td></tr>
      <tr><td class="small">Budget:</td><td><?php echo $row['budget'] ?></td></tr>
      <tr><td class="small">Report:</td><td style="color: green;"><?php echo $msg ?></td></tr>

</table>
<?php
}
?>
</body>
</html>
<?php
}
else {
  header('location:index.php');
}
 ?>
