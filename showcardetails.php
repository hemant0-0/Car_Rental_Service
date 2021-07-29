<?php
$conn=mysqli_connect('localhost','root','','crs');
$carid1=$_POST['carid'];
$query="SELECT * from cars where id='$carid1' LIMIT 1";
$result=mysqli_query($conn,$query);
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
  background: #ff5733;
  display: block;
  margin:2px auto;
  text-align: center;
  border: 2px solid #ff5733;
  padding: 14px 80px;
  outline: none;
  color:#000;
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

h2{
  font-size: 50px;
  margin-left: 600px;
  margin-top: 20px;
  color: #000;

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
  <li><a href="all_cars.php">BACK</a></li>
</ul>
</nav>
</div>
<h2>Car Details</h2>
<?php
while ($row=mysqli_fetch_array($result)) {
 ?>
<div class="maindiv1">
<?php
echo "<img src='images/".$row['image']."' width=380px height=380px >";
?>
</div>
<table>
      <tr><td class="small">Car Name:</td><td><?php echo $row['c_name'] ?></td></tr>
      <tr><td class="small">Description:</td><td><?php echo $row['text'] ?></td></tr>
      <tr><td class="small">Location:</td><td><?php echo $row['city'] ?></td></tr>
      <tr><td class="small">Budget:</td><td><?php echo $row['budget'] ?></td></tr>
      <tr><td class="small"><form action="userlogin.php" method="post">Book Car:
      </td><td>
      <input type="submit" name="book" value="Book Now">
      </form>
      </td></tr>
</table>
<?php
}
?>
</body>
</html>
