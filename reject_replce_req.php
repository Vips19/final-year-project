<?php
	include("connection.php");
	$id=$_GET['id'];
	$sql=mysql_query("update order_detail set Status='Replacement_Request_Rejected',Statement='Request Rejected' where Order_Id='$id'");
	if($sql==1){
		header("location:Or_Approval.php?msg=success");
			
	}
	else{
		header("location:Or_Approval.php?msg=failed");	
	}
?>