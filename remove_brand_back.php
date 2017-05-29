<?php

include("connection.php");
echo $bid=$_POST['bid'];
	$sql="delete from watch where Brand_Id='$bid'";
	$rs=mysql_query($sql);

	$sql1="delete from brand where Brand_Id='$bid'";
	$rs1=mysql_query($sql1);
	if($rs1==1){
		header("location:Admin_home.php?msg=successful");
	}
	else{
		header("location:remove_brand.php?msg=unsuccessful");
	}
?>