<?php
session_start();
$conn=mysqli_connect('localhost','root','','crs');
$msg="";
if (isset($_POST['submit'])) {
  $name=$_POST['name'];
  $mobno=$_POST['mobno'];
  $address=$_POST['address'];
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $conf_password=$_POST['conf_password'];
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $msg="Incorrect Email Entered";
  }
  else if (!preg_match("/^\d{10}+$/", $mobno)) {
    $msg="Invalid Mobile Number";
  }
  else if(strcasecmp($password,$conf_password)==0 && filter_var($email,FILTER_VALIDATE_EMAIL)==0)
  {
  mysqli_query($conn,"INSERT INTO user(name, mob_no, addr, u_name, pass, email) VALUES ('$name','$mobno','$address','$username','$password','$email')");
  header('location:userlogin.php');

}
else{
$msg="Entered passwords does not match";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>CRS</title>
<link rel="stylesheet" type="text/css" href="css/sty.css">
<style>
body{
margin: 0;
padding: 0;
font-family:sans-serif;
background-position: center;
background-size: cover;
}
.loginbox{
  margin-top: 1.3%;
  margin-left: 24%;
  width:700px;
  height:900px;
  background:#fff;
   border-radius: 1px;
  color: #000;
  position: inherit;
  box-sizing: border-box;
  padding: 70px 30px;
  border: 2px solid #DC143C;
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

.loginbox input[type="text"], input[type="password"],input[type="number"],textarea
{
  border:0;
   background: none;
   display: block;;
   margin:30px auto;
   font-size: 17px;
   text-align: center;
   border: 2px solid #DC143C;
   padding: 14px 10px;
   width: 320px;
   outline: none;
   color:#000;
   transition: 0.25s;
   border-radius: 12px;
}

.loginbox input[type="text"]:focus,.loginbox input[type="password"]:focus,.loginbox input[type="number"]:focus,.loginbox textarea:focus{
  width: 350px;
  border-color: #2ecc71;
}

.loginbox input[type ="Submit"]{
  width: 30%;
  border:0;
  font-size: 15px;
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
  font-size: 15px;
  border: 2px solid #DC143C;
  color: #fff;
}



.loginbox a{
  text-decoration: none;
  font-size: 15px;
  line-height: 20px;
  color: darkgrey;
  text-align: center;
  margin-left: 25%;
}



.loginbox a:hover{
  color:#DC143C;
}


center{
  top: 50%;
  left: 0%;
  transform: translate(0%,-50%);
  color: red;
  font-size: 20px;
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
  <li><a href="#">ABOUT</a></li>
  <li><a href="all_cars.php">ALL CARS</a></li>
  <li><a href="userlogin.php">USER LOGIN</a></li>
  <li><a href="adminlogin.php">ADMIN LOGIN</a></li>
  <li class="active"><a href="register.php">REGISTER</a></li>
  </ul>
</nav>
</div>
<div class="loginbox">
    <h2>Register</h2>
    <?php echo '<center>'.$msg.'</center>'; ?>
    <form action="" method="post">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="number" name="mobno" placeholder="Mobile Number" required>
      <textarea name="address" placeholder="Address" required></textarea>
      <input type="text" name="username" placeholder="Username" required>
      <input type="text" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="conf_password" placeholder="Confirm Password" required>
      <input type="submit" name="submit" value="Sign Up"><br>
    </form>
  </div>


</body>
</html>
