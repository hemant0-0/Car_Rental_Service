<?php
session_start();
if ($_SESSION['user_name']==true) {
  $conn=mysqli_connect('localhost','root','','crs');
  if (isset($_REQUEST["updateimg"])) {
  $file=$_FILES["file"]["name"];
  $tmp_name=$_FILES["file"]["tmp_name"];
  $path="image/".$file;
  $id=$_REQUEST["id"];
    move_uploaded_file($tmp_name,$path);
    mysqli_query($conn,"update cars set image='$file' where id='$id'");
    header("location: update_cars.php");
  }

  if (isset($_REQUEST["updatename"])) {
  $hallname=$_REQUEST['hallname'];
  $id=$_REQUEST["id"];
    mysqli_query($conn,"update cars set c_name='$hallname' where id='$id'");
    header("location: update_cars.php");
  }

  if (isset($_REQUEST["updatedesc"])) {
  $desc=$_REQUEST['description'];
  $id=$_REQUEST["id"];
    mysqli_query($conn,"update cars set text='$desc' where id='$id'");
    header("location: update_cars.php");
  }

  if (isset($_REQUEST["updatecity"])) {
  $city=$_REQUEST['city'];
  $id=$_REQUEST["id"];
    mysqli_query($conn,"update CARS set  city='$city' where id='$id'");
    header("location: update_cars.php");
  }


    if (isset($_REQUEST["updatebudget"])) {
    $budget=$_REQUEST['budget'];
    $id=$_REQUEST["id"];
      mysqli_query($conn,"update CARS set budget='$budget' where id='$id'");
      header("location: update_cars.php");
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
  width: auto;
  border:0;
  background: #ff5733;
  display: block;
  margin:auto;
  text-align: center;
  border: 2px solid #ff5733;
  padding: 4px 40px;
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

input[type="text"], input[type="password"],input[type="file"],input[type="number"],textarea
{
   background: none;
   display: block;;
   margin: auto;
   font-size: 17px;
   background: #fff;
   text-align: center;
   border: 2px solid #ff5733;
   padding: 4px 10px;
   width: 120px;
   outline: none;
   color:#000;
   transition: 0.25s;
   border-radius: 5px;
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
<li><a href="viewcars.php">VIEW CARS</a></li>
<li><a href="bookings.php">CHECK BOOKINGS</a></li>
<li><a href="add_cars.php">ADD CARS</a></li>
<li class="active"><a href="update_cars.php">UPDATE CARS</a></li>
<li><a href="delete_cars.php">REMOVE CARS</a></li>
<li><a href="book_hist.php">BOOKING HISTORY</a></li>
<li><a href="user_details.php">USER DETAILS</a></li>
<li><a href="viewfeedback.php">VIEW FEEDBACK</a></li>
<li><a href="logout.php">LOGOUT</a></li>
</ul>
</div>

<div class="main_content">
  <div class="header"><h1>Car Rental Services</i></h1></div>
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
    $sql="SELECT id, image, c_name, text, city, budget FROM cars";
    $result=mysqli_query($conn,$sql);

    while ($row=mysqli_fetch_array($result)) {
    ?>
    <tr>
    <td><?php echo $row['id'] ?></td>
    <td><img src="images/<?php echo $row['image']  ?>" width="120px" height="120px" >
    <form method="post" enctype="multipart/form-data">
    <br><input type="hidden" name="id" value="<?php echo $row["id"] ?>">
    <br><input type="file" name="file" required>
    <br><input type="submit" name="updateimg" value="Update">
    </form>
    </td>
    <td><?php echo $row['c_name'] ?>
    <form method="post" enctype="multipart/form-data">
    <br><input type="hidden" name="id" value="<?php echo $row["id"] ?>">
    <br><input type="text" name="hallname" required>
    <br><input type="submit" name="updatename" value="Update">
    </form></td>
    <td><?php echo $row['text'] ?>
    <form method="post" enctype="multipart/form-data">
    <br><input type="hidden" name="id" value="<?php echo $row["id"] ?>">
    <br><textarea name="description" required></textarea>
    <br><input type="submit" name="updatedesc" value="Update">
    </form></td>
    <td><?php echo $row['city'] ?>
    <form method="post" enctype="multipart/form-data">
    <br><input type="hidden" name="id" value="<?php echo $row["id"] ?>">
    <br><input type="text" name="city" required>
    <br><input type="submit" name="updatecity" value="Update">
    </form></td>
    <td><?php echo $row['budget'] ?>
    <form method="post" enctype="multipart/form-data">
    <br><input type="hidden" name="id" value="<?php echo $row["id"] ?>">
    <br><input type="number" name="budget" required>
    <br><input type="submit" name="updatebudget" value="Update">
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
