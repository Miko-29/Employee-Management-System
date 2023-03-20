<?php 

session_start(); 

error_reporting(0); 

include('dbconnection.php'); 

if (strlen($_SESSION['aid']==0))  

{ 

header('location:logout.php'); 

} else  

{ 

if(isset($_GET['delid'])) 

{ 

$eid=$_GET['delid']; 

$query=mysqli_query($con," 

DELETE FROM `employeedetail` WHERE `employeedetail`.`ID` ='$eid'"); 

echo "<script>alert('Record Deleted successfully');</script>"; 

echo "<script>window.location.href='allemployees.php'</script>"; 

} 

?> 

<!DOCTYPE html> 

<html style="background-color: #d7cec7"> 

<head> 

<title>Employees Details</title> 

<link rel="stylesheet" href="styles.css"> 

</head> 

<body> 

<h3>Employee Record Managment System</h3> 

<a  href="logout.php"><button class="menu">Logout</button></a>  

<a href="register.php"><button class="menu">Add New Employee </button></a> 

<h1>Employees Details</h1> 

<div class="table-responsive"> 

<table id="dataTable" width="100%" cellspacing="0"> 

<tr style="background-color: #565656"> 

<th >S.no.</th> 

<th>Emp Code</th> 

<th>Emp First Name</th> 

<th>Emp Last Name</th> 

<th>Emp Department</th> 

<th>Emp Designation</th> 

<th>Emp Email</th> 

<th>Emp Contact no</th> 

<th>Emp Joining Date (yyyy-mm-dd)</th> 

<th>Action</th> 

</tr> 

<?php 

$ret=mysqli_query($con,"select * from employeedetail"); 

$cnt=1; 

while ($row=mysqli_fetch_array($ret)) { 

?> 

<tr> 

<td><?php echo $cnt;?></td> 

<td><?php  echo $row['EmpCode'];?></td> 

<td><?php echo $row['EmpFirstName'];?></td> 

<td><?php echo $row['EmpLastName'];?></td> 

<td><?php echo $row['EmpDepartment'];?></td> 

<td><?php echo $row['EmpDesignation'];?></td> 

<td><?php echo $row['EmpEmail'];?></td> 

<td><?php echo $row['EmpContactNo'];?></td> 

<td><?php echo $row['EmpJoiningDate'];?></td> 

<td> 

<a href="editempdetails.php?editid=<?php echo $row['ID'];?>" style="color:#8f3d4c">Edit Employee Details</a> |<a href="allemployees.php?delid=<?php echo $row['ID'];?>" onclick="return confirm('Do you really want to delete');" style="color:red">Delete</a> 

</td> 

</tr> 

<?php  

$cnt=$cnt+1; 

}?> 

</table> 

</div> 

</body> 

</html> 

<?php }  ?> 
