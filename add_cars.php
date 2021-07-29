<?php
session_start();
if ($_SESSION['user_name']==true) {
$msg="";
if (isset($_POST["upload"])) {
  $target= "images/".basename($_FILES['image']['name']);
  $db=mysqli_connect('localhost','root','','crs');

  $image=$_FILES['image']['name'];
  $carname=$_POST['carname'];
  $text=$_POST['text'];
  $city=$_POST['city'];
  $budget=$_POST['budget'];
  $status="available";
  $sql="INSERT INTO cars(c_name, image, text,city,status,budget) VALUES ('$carname','$image','$text','$city','$status','$budget')";
  mysqli_query($db,$sql);

  if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
    $msg= "Car uploaded successfully";

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
  background:#fff;
  color: #000;
  border-radius: 1px;
  border: 2px solid #ff5733;
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
   border: 2px solid #ff5733;
   padding: 14px 10px;
   width: 400px;
   outline: none;
   color:#000;
   border-radius: 12px;
   transition: 0.25s;
}

.loginbox input[type="hidden"]:focus,.loginbox input[type="file"]:focus,.loginbox textarea:focus,.loginbox input[type="number"]:focus,.loginbox input[type="text"]:focus{
  width: 480px;
  border-color: #2ecc71;
}

.loginbox input[type ="submit"]{
  width: 20%;
  border:0;
  background: none;
  display: block;;
  margin:20px auto;
  text-align: center;
  background: #ff5733;
  border: 2px solid #ff5733;
  padding: 14px 40px;
  outline: none;
  color:#000;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
  font-size: 18px;
}

.loginbox input[type ="Submit"]:hover{
  background: #2ecc71;
  border: 2px solid #2ecc71;
}



center{
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);

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
<li><a href="bookings.php">CHECK BOOKINGS</a></li>
<li class="active"><a href="add_cars.php">ADD CARS</a></li>
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
  <div class="loginbox">
      <h2>ADD NEW car</h2>

      <?php  echo $msg ?>
    <form class="" action="add_cars.php" enctype="multipart/form-data" method="post">
      <input type="hidden" name="size" value="1000000">
      <input type="text" name="carname" placeholder="Car Name">
      <input type="file" name="image" value="">
        <textarea name="text" rows="4" cols="40" placeholder="Add Description"></textarea>
        <input type="text" name="city" placeholder="City">
        <input type="number" name="budget" placeholder="Budget">
        <input type="submit" name="upload" value="Upload car">

    </form>
  </div>
  </div></div>
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
