<?php
	include("connection.php");
	$pn=$_POST['pname'];
	echo $pid=strtok($pn,".");
	
	$query=mysql_query("delete from watch where Product_Id='$pid'");
	if($query==1){
		header("location:remove_product.php?msg=sucsessful");	
	}
	else{
		header("location:remove_product.php?msg=failed");
	}

?>