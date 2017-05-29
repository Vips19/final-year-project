<?php
	include("connection.php");
	echo $itemno=$_GET['in'];
	$sql=mysql_query("update cart_detail set Product_Id='0' where Item_No='$itemno' and mobile='{$_SESSION['user']['mobile']}'");
	if($sql==1){
		$sql=mysql_query("select product_Id,Item_No from cart_detail where Product_Id!=0 and mobile='{$_SESSION['user']['mobile']}'");
		echo $c=mysql_num_rows($sql);
		if($c=="0"){
		header("location:product_home.php?msg=Cart is empty");
		}
		else{
		header("location:cart.php?msg=Item removed successfully");
		}
	}
	else{
		header("location:cart.php?msg=error");
	}
	
?>