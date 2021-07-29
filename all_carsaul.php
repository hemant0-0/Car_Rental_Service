<?php
session_start();
if ($_SESSION['user_name']==true) {
  $conn=mysqli_connect('localhost','root','','crs');

 ?>
<!DOCTYPE html>
<html>
<head>
<title>CRS</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>

*{
margin: 0;
padding: 0;
}
  .container{
    max-width: 1200px;
    margin: auto;
    overflow: auto;
    border: none;
  }

  .gallery{
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 380px;
  }

  .gallery img{
    width: 100%;
    height: auto;
  }
  .desc input[ type="submit"]{
    padding: 15px;
    text-align: :center;
    width: 380px;
    background-color: #f2f2f2;
  }
  .desc a:hover{
    color: #fff;
    background: #000;
  }

  .searchbox
  {
  margin-left: 280px;
  margin-top: 0px;
  margin-bottom: 0px;
  }
  .searchbox form{
    display: inline;
  }

  .searchbox input[type="text"],.searchbox input[type="number"]
  {
    border:0;
     background: #fff;
     margin:20px auto;
     font-size: 17px;
     text-align: center;
     border: 2px solid #ff5733;
     padding: 11px 40px;
     width: 160px;
     outline: none;
     color:#000;
     transition: 0.25s;
     border-radius: 12px;
  }

  .searchbox input[type ="submit"]{
    width: auto;
    border:0;
    background: #fff;
    margin:20px auto;
    text-align: center;
    border: 2px solid #ff5733;
    padding: 14px 40px;
    outline: none;
    color:#000;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer;
  }

  .searchbox input[type ="submit"]:hover{
    background: #ff5733;
    border: 2px solid #ff5733;
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
  <li class="active"><a href="all_carsaul.php">ALL CARS</a></li>
  <li><a href="userpanel.php">USER PANEL</a></li>
  <li><a href="logout.php">LOGOUT</a></li>
</ul>
</nav>
<div class="searchbox">
  <form action="all_carsaul.php" method="post">
    <input type="text" name="location" placeholder="Enter Location" required>
    <input type="number" name="budget" placeholder="Enter Budget" required>
    <input type="submit" name="search" value="Search">
  </form>
  <form action="all_carsaul.php" method="post">
    <input type="submit" name="cancel" value="Cancel">
  </form>
</div><br><br><br>
<div class="container">
  <?php
  if (isset($_POST['search'])) {
    $loc=$_POST["location"];
    $budget=$_POST["budget"];
    $avl1="available";
    $sql1="SELECT id, c_name, image FROM cars WHERE city='$loc' AND budget<='$budget'";
    $result1=mysqli_query($conn,$sql1);
    while ($row1=mysqli_fetch_array($result1)) {
      echo "<form action='show.php' method='post'>";
      echo "<input type='hidden' name='carid' value='".$row1['id']."'>";
                echo "<div class='gallery'>";
                      echo "<img src='images/".$row1['image']."'>";
                      echo "<div class='desc'>";
                      echo "<input type='submit' name='' value='".$row1['c_name']."' >";
                echo"</div>";
      echo "</div>";
      echo "</form>";
  }
}
elseif (isset($_POST['cancel'])) {
  $avl="available";
  $sql= "SELECT id, c_name, image FROM cars";
  $result=mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_array($result)) {
    echo "<form action='show.php' method='post'>";
    echo "<input type='hidden' name='carid' value='".$row['id']."'>";
              echo "<div class='gallery'>";
                    echo "<img src='images/".$row['image']."'>";
                    echo "<div class='desc'>";
                    echo "<input type='submit' name='' value='".$row['c_name']."' >";
              echo"</div>";
    echo "</div>";
    echo "</form>";
  }

}
  else{
  $sql= "SELECT id, c_name, image FROM cars";
  $result=mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_array($result)) {
    echo "<form action='show.php' method='post'>";
    echo "<input type='hidden' name='carid' value='".$row['id']."'>";
              echo "<div class='gallery'>";
                    echo "<img src='images/".$row['image']."'>";
                    echo "<div class='desc'>";
                    echo "<input type='submit' name='' value='".$row['c_name']."' >";
              echo"</div>";
    echo "</div>";
    echo "</form>";
  }

    }
  ?>
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
