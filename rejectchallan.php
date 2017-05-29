<?php
	include("connection.php");
	$id=$_GET['id'];
	$sql=mysql_query("update newstock_transaction set Status='Rejected' where Tid='$id'");
	if($sql==1){
		header("location:stock_approval.php?msg=success");
			
	}
	else{
		header("location:stock_approval.php?msg=failed");	
	}
?>