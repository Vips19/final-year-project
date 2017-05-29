<?php

   include("connection.php");
	echo $eu=$_POST['txt_eu'];
	echo $pass=$_POST['txt_pas'];
	
	$sql="select * from admin where User_name='$eu' AND Emp_pass='$pass'";
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs))
	{
		$sql1="select * from admin where User_name='$eu'";
		$rs1=mysql_query($sql1);
		if(mysql_num_rows($rs1)){
			$row=mysql_fetch_array($rs1);
			$_SESSION['admin']=$row;
		}
		header("location:OR_Approval.php");
	}
	else
	{
		header("location:Admin_login.php?ch=CHECK YOUR USERNAME AND PASSWORD");
	}