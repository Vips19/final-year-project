<?php
	include("connection.php");
	
	echo $empid=$_POST['emp_id'];
	echo $empname=$_POST['emp_name'];
	echo $empemial=$_POST['emp_email'];
	echo $empmob=$_POST['emp_mno'];
	$suser='0';
	$query=mysql_query("Insert into admin (Emp_Id,Emp_Name,Super_User,Mob_no,Email) Values('$empid'	,'$empname','$suser','$empmob','$empemial')");
	if($query==1){
		header("location:Admin_home.php?msg=Admin detail insertion successful");	
	}
	else{
		header("location:Set_admin_det.php?msg=Admin detail insertion failed");
	}
		
		
	
?>