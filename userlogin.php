<?php
session_start();
$conn=mysqli_connect('localhost','root','','crs');//db is name of database created in mysqlphpmyadmin
?>
<!DOCTYPE html>
<html>
<head>
<title>CRS</title>
<link rel="stylesheet" type="text/css" href="css/sty.css">
<style>
.loginbox{
  margin-left: 30%;
  margin-top: 1.3%;
  width:500px;
  height:450px;
  background:#fff;
  color: #000;
  border-style: solid;
  border-color: #DC143C;
  border-radius: 1px;
  position: inherit;
  box-sizing: border-box;
  padding: 70px 30px;
}

h2{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 30px;
    font-weight: 600;
    text-transform: uppercase;
}

.loginbox p{
  margin: 0;
  padding: 0;
  font-weight: bold;

}

.loginbox input{
  width:100%;
  margin-bottom: 20px;


}

.loginbox input[type="text"], input[type="password"]
{
  border:0;
   background: none;
   display: block;;
   margin:30px auto;
   font-size: 17px;
   text-align: center;
   border: 2px solid #DC143C;
   padding: 14px 10px;
   width: 200px;
   outline: none;
   color:#000;
   border-radius: 12px;
   transition: 0.25s;
}

.loginbox input[type="text"]:focus,.loginbox input[type="password"]:focus{
  width: 280px;
  border-color: #2ecc71;
}

.loginbox input[type ="Submit"]{
  width: 30%;
  border:0;
  background: none;
  display: block;;
  margin:20px auto;
  text-align: center;
  background: #fff;
  border: 2px solid #DC143C;
  padding: 14px 40px;
  outline: none;
  color: #DC143C;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
}

.loginbox input[type ="Submit"]:hover{
  background: #DC143C;
  border: 2px solid #DC143C;
  color: #fff;
}


.loginbox a{
  text-decoration: none;
  font-size: 15px;
  line-height: 20px;
  color: #000;
  text-align: center;
  margin-left: 25%;
}



.loginbox a:hover{
  color:#DC143C;
}



</style>
</head>
<body>
<header>
    <div class="main">
	<div class="title">
		<h1>Car Rental System</h1>
</div>
<nav>
<ul>
<li><a href="index.php">HOME</a></li>
<li><a href="about.php">ABOUT</a></li>
<li><a href="all_cars.php">ALL CARS</a></li>
<li class="active"><a href="userlogin.php">USER LOGIN</a></li>
<li><a href="adminlogin.php">ADMIN LOGIN</a></li>
<li><a href="register.php">REGISTER</a></li>
</ul>
</nav>
</div>
<div class="loginbox">
    <h2>User Login</h2>
    <form action="" method="post">
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <input type="submit" name="submit" value="Login"><br>
      <a href="register.php">Don't have an account? signup </a>
    </form>
  </div>


</body>
</html>
<?php
if(isset($_POST['submit']))
{
  $user=$_POST['username'];
  $pwd=$_POST['password'];
  $query="SELECT * FROM user where u_name='$user' && pass='$pwd'";
  $data=mysqli_query($conn,$query);
  $total=mysqli_num_rows($data);
  if($total==true)
  {
    $_SESSION['user_name']=$user;
    header('location: userpanel.php');
    die;
  }
  else
  {
    echo "<center>"."Invalid Username or Password"."</center>";
  }

}
 ?>
