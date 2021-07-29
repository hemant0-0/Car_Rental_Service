<?php
session_start();
  $conn=mysqli_connect('localhost','root','','owh');
  $upid=$_REQUEST['ebid'];
if (isset($_POST["upload"])) {
  $target= "images/".basename($_FILES['image']['name']);
  $db=mysqli_connect('localhost','root','','owh');

  $image=$_FILES['image']['name'];
  $hallname=$_POST['hallname'];
  $text=$_POST['text'];
  $city=$_POST['city'];
  $budget=$_POST['budget'];

  $sql="UPDATE halls SET h_name='".$hallname."' ,image='".$image."',text='".$text."',budget='".$budget."',city='".$city."' WHERE id='".$upid."'";
  mysqli_query($db,$sql);


  if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
    $msg= "Image uploaded successfully";

  }
  else {
    $msg= "There was a problem uploading the image";
  }
}
  ?>
<!DOCTYPE html>
<html>
<head>
<title>ONLINE WEDDDING BANQUET BOOKING SYSTEM</title>
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
.loginbox h2{
  margin: 0;
  padding: 0 0 20px;
text-align: center;
font-size: 30px;
font-weight: 600;
text-transform: uppercase;
}
.loginbox{
  width:70%;
  height:750px;
  position:absolute;
  left: 80%;
  top: -15%;
  transform: translate(-80%,15%);
  background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),#000;
  color: #fff;
  border-radius: 24px;
  box-sizing: border-box;
  padding: 70px 30px;
}
.loginbox input,.loginbox textarea
{
  margin-left:39%;
  width:100%;
  margin-bottom: 20px;
}

.loginbox input[type="hidden"],.loginbox input[type="file"],.loginbox textarea,.loginbox input[type="number"],.loginbox input[type="text"]
{
  border:0;
   background: none;
   display: block;;
   margin:30px auto;
   font-size: 17px;
   text-align: center;
   border: 2px solid #DC143C;
   padding: 14px 10px;
   width: 280px;
   outline: none;
   color:#fff;
   border-radius: 12px;
   transition: 0.25s;
}

.loginbox input[type="hidden"]:focus,.loginbox input[type="file"]:focus,.loginbox textarea:focus,.loginbox input[type="number"]:focus,.loginbox input[type="text"]:focus{
  width: 280px;
  border-color: #2ecc71;
}

.loginbox input[type ="submit"]{
  width: 20%;
  border:0;
  background: none;
  display: block;;
  margin:20px auto;
  text-align: center;
  border: 2px solid #DC143C;
  padding: 14px 40px;
  outline: none;
  color:white;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
}

.loginbox input[type ="Submit"]:hover{
  background: #2ecc71;
  border: 2px solid #2ecc71;
}

.wrapper1 .main_content .maindiv{
  width:70%;
  height:450px;
  position:absolute;
  left: 80%;
  top: -30%;
  transform: translate(-80%,30%);
  background-size: 100%;
  background-color: #000;
  box-shadow: 1px 2px black;
}
.wrapper1{
display:   flex;
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

.wrapper1 .main_content .header h1{
  margin-top:20px;
  margin-left:190px;
  color: #fff;
  font-size: 50px;
  border-bottom: 3px;
  border-color: #000;
}


</style>
</head>
<body>
<div class="wrapper1">
<div class="sidebar">
<ul>
<h2>ADMIN PANEL</h2>
<li><a href="bookings.php">CHECK BOOKINGS</a></li>
<li><a href="add_halls.php">ADD HALLS</a></li>
<li class="active"><a href="update_halls.php">UPDATE HALLS</a></li>
<li><a href="delete_halls.php">REMOVE HALLS</a></li>
<li><a href="book_hist.php">BOOKING HISTORY</a></li>
<li><a href="user_details.php">USER DETAILS</a></li>
<li><a href="user_delete.php">REMOVE USER</a></li>
<li><a href="index.html">LOGOUT</a></li>
</ul>
</div>

<div class="main_content">
  <div class="header"><h1><i>Marriage Hall Booking System</i></h1></div>
  <div class="loginbox">
      <h2>ADD NEW HALL</h2>
    <form class="" action="update_halls.php" enctype="multipart/form-data" method="post">
      <input type="hidden" name="size" value="1000000">
      <input type="text" name="hallname" placeholder="Hall Name">
      <input type="file" name="image" value="">
        <textarea name="text" rows="4" cols="40" placeholder="Add Description"></textarea>
        <input type="text" name="city" placeholder="City">
        <input type="number" name="budget" placeholder="Budget">
        <input type="submit" name="upload" value="Upload Hall">
    </form>
  </div>
  </div></div>
</div>
</div>
</body>
</html>
