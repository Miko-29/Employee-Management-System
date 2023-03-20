<?php 

session_start(); 

include('dbconnection.php'); 

 if(isset($_POST['login'])) 

 { 

 $uname = $_POST['username']; 

 $password = $_POST['password']; 

 $query = mysqli_query($con, "SELECT ID FROM tableadmin WHERE AdminUserName = '$uname' && Password='$password' "); 

 $ret=mysqli_fetch_array($query); 

    if($ret>0){ 

      $_SESSION['aid']=$ret['ID']; 

     header('location:allemployees.php'); 

    } 

    else{ 

      echo "Invalid Details"; 

    } 

 } 

 ?> 

<!DOCTYPE html> 

 <html style="background-color: #d7cec7"> 

 <head> 

<title>Admin Login</title> 

<link rel="stylesheet" href="styles.css"> 

</head> 

<body> 

<div class="container"> 

<h3>Employee Record Managment System</h3> 

<div class="text-center"> 

<h1>Admin login!</h1> 

</div> 

<form  class="formbg"  method="post" action=""> 

<div class="form-group"> 

<input type="test" class="form-control form-control-user" id="username" name="username" required="true" placeholder="Enter username"> 

</div> 

<div class="form-group"> 

<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required="true"> 

</div> 

<p><center> <input class="menu" type="submit" name="login" value="LOGIN"></p></center> 

</form> 

</div> 

</body> 

</html> 
