<?php
session_start();
if ($_SESSION['user_name']==true) {
  $conn=mysqli_connect('localhost','root','','crs');
  $user=$_SESSION['user_name'];
  $sql="select * from user where u_name='$user'";
  $result=mysqli_query($conn,$sql);

  if (isset($_POST["updatename"])) {
  $newname=$_POST['name'];
  $id=$_POST['id'];
  mysqli_query($conn,"update user set name='$newname' where id='$id'");
  header("location: update_user.php");
  }

  if (isset($_POST["updatemobno"])) {
  $newmobno=$_POST['mobno'];
  $id=$_POST['id'];
  mysqli_query($conn,"update user set mob_no='$newmobno' where id='$id'");
  header("location: update_user.php");
  }



  if (isset($_POST["updateemail"])) {
  $newmail=$_POST['email'];
  $id=$_POST['id'];
  mysqli_query($conn,"update user set email='$newmail' where id='$id'");
  header("location: update_user.php");
  }


    if (isset($_POST["updateaddr"])) {
    $newaddr=$_POST['addr'];
    $id=$_POST['id'];
    mysqli_query($conn,"update user set addr='$newaddr' where id='$id'");
    header("location: update_user.php");
    }


    if (isset($_POST["updatepass"])) {
    $newpass=$_POST['pass'];
    $id=$_POST['id'];
    mysqli_query($conn,"update user set pass='$newpass' where id='$id'");
    header("location: update_user.php");
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
  padding: 1px 40px;
  outline: none;
  color:white;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
}

input[type ="submit"]:hover{
  background: #2ecc71;
  border: 1px solid #2ecc71;
}

input[type="text"], input[type="password"],input[type="number"]
{
   background: none;
   display: block;;
   margin: auto;
   font-size: 17px;
   background: #fff;
   text-align: center;
   border: 1px solid #000;
   padding: 0px 10px;
   width: 120px;
   outline: none;
   color:#000;
   transition: 0.25s;
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
  <li class="active"><a href="#">UPDATE PROFILE</a></li>
  <li><a href="booking_hist_user.php">BOOKING HISTORY</a></li>
  <li><a href="feedback.php">FEEDBACK</a></li>
</ul>
</div>
<?php
$row=mysqli_fetch_array($result)
 ?>

<table>
      <tr><td class="small">Name</td><td><?php echo $row['name'] ?></td>
        <td>
        <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="text" name="name" required>
        <br><input type="submit" name="updatename" value="Update">
        </form>
      </td></tr>
      <tr><td class="small">Mobile No</td><td><?php echo $row['mob_no'] ?></td>
        <td>
        <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="text" name="mobno" required>
        <br><input type="submit" name="updatemobno" value="Update">
        </form>
      </td></tr>

      <tr><td class="small">Email</td><td><?php echo $row['email'] ?></td>
        <td>
        <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="text" name="email" required>
        <br><input type="submit" name="updateemail" value="Update">
        </form>
      </td></tr>
      <tr><td class="small">Address</td><td><?php echo $row['addr'] ?></td>
        <td>
        <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="text" name="addr" required>
        <br><input type="submit" name="updateaddr" value="Update">
        </form>
      </td></tr>
      <tr><td class="small">Password</td><td><?php echo $row['pass'] ?></td>
        <td>
        <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="text" name="pass" required>
        <br><input type="submit" name="updatepass" value="Update">
        </form>
      </td></tr>
</table>
</body>
</html>
<?php
}
else {
  header('location:index.php');
}
 ?>
