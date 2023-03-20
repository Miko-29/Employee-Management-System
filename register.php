<?php 

include('dbconnection.php'); 

error_reporting(0); 

if(isset($_POST['submit'])) 

{ 

  $eid=$_GET['editid']; 

    $FirstName=$_POST['FirstName']; 

    $LastName=$_POST['LastName']; 

    $EmpCode=$_POST['EmpCode']; 

    $EmpDepartment=$_POST['EmpDepartment']; 

    $EmpDesignation=$_POST['EmpDesignation']; 

    $EmpContactNo=$_POST['EmpContactNo']; 

    $Gender=$_POST['Gender']; 

    $empjdate=$_POST['EmpJoiningdate']; 

  $ret=mysqli_query($con, "select EmpEmail from employeedetail where EmpEmail='$Email'"); 

  $result=mysqli_fetch_array($ret); 

  if($result>0){ 

    $msg="This email already associated with another account"; 

  } 

  else{ 

    $query=mysqli_query($con, "insert into employeedetail(EmpFirstName, EmpLastName, EmpCode, EmpDepartment, EmpDesignation, EmpContactNo, EmpGender, EmpEmail,EmpJoiningdate) value('$FirstName', '$LastName', '$EmpCode', '$EmpDepartment' , '$EmpDesignation' , '$EmpContactNo' , '$EmpGender', '$Email' , '$EmpJoiningdate')"); 

    if ($query) { 

      $msg="You have successfully registered"; 

    } 

    else 

    { 

      $msg="Something Went Wrong. Please try again"; 

    } 

  } 

} 

?> 

<!DOCTYPE html> 

<html style="background-color: #d7cec7"> 

<head> 

  <title>Employee Record Managment System</title> 

  <link rel="stylesheet" href="styles.css"> 

</head> 

<body> 

  <div > 

    <h3>Employee Record Managment System</h3> 

    <a href="allemployees.php"><button class="menu">Back</button></a> 

    <h1>Register New Employee</h1> 

    <p style="font-size:16px; color:#8f3d4c" align="center"><?php if($msg){ 

      echo $msg; 

    }  ?> </p> 

    <form class="formbg" name="register" method="post" onsubmit="return checkpass();"> 

      <input type="text"  id="FirstName" name="FirstName" placeholder="First Name" pattern="[A-Za-z]+" required="true"> 

      </br> 

      <input type="text"  id="LastName" name="LastName" placeholder="Last Name" pattern="[A-Za-z]+" required="true"> 

      </br> 

      <input type="text" id="EmpCode" name="EmpCode" placeholder="Employee Code" pattern="[0-9]+" required="true"> 

      </br> 

      <input type="text" id="EmpDepartment" name="EmpDepartment" placeholder="Department" required="true"> 

      </br> 

      <input type="text" id="EmpDesignation" name="EmpDesignation" placeholder="Designation" required="true"> 

      </br> 

      <input type="text" id="EmpContactNo" name="EmpContactNo" placeholder="Contact No" required="true"> 

      </br> 

      <input type="email" id="Email" name="Email" placeholder="Email Address" required="true"> 

      </br> 

      <input type="date" id="EmpJoiningDate" name="EmpJoiningDate" placeholder="Joining Date" required="true"> 

      </br> 

      <input type="radio" id="Gender" name="Gender" value="Male">Male 

      <input type="radio" id="Gender" name="Gender" value="Female">Female 

      <center><input class="menu" type="submit" name="submit" value="Register Employee"></center> 

    </form> 

    <script type="text/javascript"> 

      $(".EmpJoiningDate").datepicker({ 

        format: 'yyyy-mm-dd', 

        autoclose: true 

      }).datepicker("update", "10/10/2016");  

    </script> 

  </div> 

</body> 

</html> 
