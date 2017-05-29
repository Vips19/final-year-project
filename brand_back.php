<?php

	include("connection.php");
	
	
	echo $bn=$_POST['txt_bn'];
	echo $bd=$_POST['txt_bd'];
	echo $ws=$_POST['txt_ws'];
	echo $sql="insert into brand (Brand_name,Brand_details,Warranty_summary) values ('$bn','$bd','$ws')";
	echo $rs=mysql_query($sql);
	
	if($rs==1)
	{
		header("location:Brand_entry.php?msg=SUCCESSFUL");
		
	}
	else{
		header("location:Brand_entry.php?msg=FAILED");
	}
?>