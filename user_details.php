<?php
session_start();
if ($_SESSION['user_name']==true) {
  $conn=mysqli_connect('localhost','root','','crs');
  if (isset($_REQUEST['delete'])) {
    $uid=$_REQUEST['id'];
    mysqli_query($conn,"delete from user where id=".$uid."");
  }
 ?>
<!DOCTYPE html>
<html>
<head>
<title>CRS</title>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: sans-serif;
}
body{
background-image: url("css/img/bag.jpg");
background-size: 100%;
margin: 0;
padding: 0;
font-family:sans-serif;
}
table{
  width:96%;
  margin: auto;
  border: 1px solid #FF5733;
  border-collapse: collapse;
  text-align: center;
  font-size: 20px;
  table-layout: fixed;
  background: #fff;
  height: auto;
  color: #000;
  margin-top: 50px;
}
td{
  width:auto;
  margin: auto;
  border: 1px solid #ff5733;
  border-collapse: collapse;
  max-width: 100px;
  padding:  8px;
  overflow: hidden;
  text-overflow: ellipsis;
  font-size: 16px;
  table-layout: fixed;
  background: #fff;
  height: auto;
  color: #000;
  margin-top: 50px;
  text-decoration: none;
}

th{
  width:auto;
  margin: auto;
  border: 1px solid #ff5733;
  border-collapse: collapse;
  max-width: 100px;
  padding:  8px;
  overflow: hidden;
  text-overflow: ellipsis;
  font-size: 16px;
  table-layout: fixed;
  background: #ff5733;
  height: auto;
  color: #000;
  margin-top: 50px;
  text-decoration: none;
}


input[type ="submit"]{
  width: 90px;
  border:0;
  background: #ff5733;
  display: block;
  margin:auto;
  text-align: center;
  border: 2px solid #ff5733;
  outline: none;
  color: #000;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
}

input[type ="submit"]:hover{
  background: #fff;
  border: 2px solid #ff5733;
}
.wrapper1{
display: flex;
position: relative;
}

.wrapper1 .sidebar{
  position: fixed;
  width: 250px;
  height: 100%;
  background: #000;
  padding: 30px 0;

}

.wrapper1 .sidebar h2{
  color:#fff;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 30px;

}

.wrapper1 .sidebar ul li{
  width: 250px;
  text-decoration: none;
  color:#fff;
  padding: 15px;
  text-align:center;
  line-height:42px;
  height:42px;
}

.wrapper1 .sidebar ul li a{
  color: #bdb8d7;
  display: block;
}

.wrapper1 .sidebar ul li a:hover{
  color: #fff;
  background-color: #333333;
}

.wrapper1 .sidebar ul li.active a{
  background-color: #fff;
  color: #000;

}

.wrapper1 .main_content {
width: 100%;
margin-left: 250px;
}

.wrapper1 .main_content .container{
width: 100%;
margin-left: 250px;
}

</style>
</head>
<body>
<div class="wrapper1">
<div class="sidebar">
<ul>
<h2>ADMIN PANEL</h2>
<li><a href="adminpanel.php">HOME</a></li>
<li><a href="viewcarss.php">VIEW CARS</a></li>
<li><a href="bookings.php">CHECK BOOKINGS</a></li>
<li><a href="add_carss.php">ADD CARS</a></li>
<li><a href="update_carss.php">UPDATE CARS</a></li>
<li><a href="delete_carss.php">REMOVE CARS</a></li>
<li><a href="book_hist.php">BOOKING HISTORY</a></li>
<li class="active"><a href="user_details.php">USER DETAILS</a></li>
<li><a href="viewfeedback.php">VIEW FEEDBACK</a></li>
<li><a href="logout.php">LOGOUT</a></li>
</ul>
</div>

<div class="main_content">
  <div class="header"><h1>Car Rental Services</h1></div>
  <table>
    <tr>
        <th>Sr.No.</th>
        <th>Name</th>
        <th>Mobile No</th>
        <th>Email</th>
        <th>Address</th>
        <th>Username</th>
        <th>Password</th>
        <th>Delete</th>
    </tr>
<?php
$sql="SELECT * FROM user";
$result=mysqli_query($conn,$sql);

while ($row=mysqli_fetch_array($result)) {
echo "<tr>
  <td>".$row['id']."</td>
  <td>".$row['name']."</td>
  <td>".$row['mob_no']."</td>
  <td>".$row['email']."</td>
  <td>".$row['addr']."</td>
  <td>".$row['u_name']."</td>
  <td>".$row['pass']."</td>";
  ?>
  <td><form method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
  <input type="submit" name="delete" value="DELETE">
  </form></td>
  </tr>
  <?php
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
