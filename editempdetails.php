<?php 

session_start(); 

error_reporting(0); 

include('dbconnection.php'); 

//error_reporting(0); 

if (strlen($_SESSION['aid']==0)) { 

  header('location:logout.php'); 

} else{ 

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

    $query=mysqli_query($con, "update employeedetail set EmpFirstName='$FirstName',  EmpLastName='$LastName', EmpCode='$EmpCode', EmpDepartment='$EmpDepartment', EmpDesignation='$EmpDesignation', EmpContactNo='$EmpContactNo', EmpGender='$Gender',EmpJoiningdate='$empjdate' where ID='$eid'"); 

    if ($query) { 

      $msg="Employee profile has been updated."; 

    } 

    else 

    { 

      $msg="Something Went Wrong. Please try again."; 

    } 

  } 

  ?> 

  <!DOCTYPE html> 

  <html style="background-color: #d7cec7"> 

  <head> 

    <title>Edit Employee Details</title> 

    <link rel="stylesheet" href="styles.css"> 

  </head> 

  <body> 

    <p style="font-size:16px; color:#8f3d4c" align="center"> <?php if($msg){ 

      echo $msg; 

    }  ?> </p> 

    <h3>Employee Record Managment System</h3> 

    <a href="allemployees.php"><button class="menu">Back</button></a> 

    <h1>Edit Details</h1> 

    <form class="formbg" method="post" action=""> 

      <?php 

      $aid=$_GET['editid']; 

      $ret=mysqli_query($con,"select * from employeedetail where ID='$aid'"); 

      $cnt=1; 

      while ($row=mysqli_fetch_array($ret)) { 

        ?> 

        <label class="fieldname">First Name</label> 

        <input type="text"  id="FirstName" name="FirstName" aria-describedby="emailHelp" value="<?php  echo $row['EmpFirstName'];?>"> 

 

        <label class="fieldname">Last Name </label> 

        <input type="text"  id="LastName" name="LastName" aria-describedby="emailHelp" value="<?php  echo $row['EmpLastName'];?>"> 

        <label class="fieldname">Employee Code </label> 

        <input type="text"  id="EmpCode" name="EmpCode" aria-describedby="emailHelp" value="<?php  echo $row['EmpCode'];?>"> 

        <label class="fieldname">Employee Department</label> 

        <input type="text" id="EmpDepartment" name="EmpDepartment" aria-describedby="emailHelp" value="<?php  echo $row['EmpDepartment'];?>"> 

        <label class="fieldname">Employee Designation</label> 

        <input type="text" id="EmpDesignation" name="EmpDesignation" aria-describedby="emailHelp" value="<?php  echo $row['EmpDesignation'];?>"> 

        <label class="fieldname">Employee Contact No.</label> 

        <input type="text" id="EmpContactNo" name="EmpContactNo" aria-describedby="emailHelp" value="<?php  echo $row['EmpContactNo'];?>"> 

        <label class="fieldname">Email</label> 

        <input type="email" id="Email" name="Email" aria-describedby="emailHelp" placeholder="Enter Email Address" value="<?php  echo $row['EmpEmail'];?>" readonly="true"> 

<label class="fieldname">Employee Joining Date(dd-mm-yyyy)</label> 

<label> 

<input type="date" value="<?php  echo $row['EmpJoiningDate'];?>" id="empjDate" name="EmpJoiningdate" aria-describedby="emailHelp"> 

<label class="fieldname">Gender</label> 

<?php if($row['EmpGender']=="Male") 

{?> 

<input type="radio" id="Gender" name="Gender" value="Male" checked="true">Male 

<input type="radio" name="Gender" value="Female">Female 

<?php }  else {?> 

<input style="" type="radio" id="Gender" name="Gender" value="Male" >Male 

<input type="radio" name="Gender" value="Female" checked="true">Female 

<?php }?> 

<?php } ?> 

<div style="margin-top:4%"> 

<center> 

<input class="menu" type="submit" name="submit"  value="Update"> 

</center> 

</div> 

</form> 

<script type="text/javascript"> 

$(".jDate").datepicker({ 

format: 'yyyy-mm-dd', 

autoclose: true 

}).datepicker("update", "10/10/2016");  

</script> 

</body> 

</html> 

<?php }  ?> 
