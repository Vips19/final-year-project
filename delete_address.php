<?php
	include("connection.php");
	echo $add=$_GET['ad'];
	if(isset($_GET['pid'])){
	$pid=$_GET['pid'];
	}
	else{
		$pid="";
	}
	if($add==1){
		$query=mysql_query("update address set st_name='',landmark='',city='',state='',pin_code='' where mobile='{$_SESSION['user']['mobile']}' and address_no='1'");
		if($query==1){
			header("location:buy_now.php?pid=$pid");
		}
		else{
			header("location:buy_now.php?pid=$pid&msg=failed");
		}
	}
	else{
		$query=mysql_query("delete 	from address where mobile='{$_SESSION['user']['mobile']}' and address_no='$add' ");
		if($query==1){
			header("location:buy_now.php?pid=$pid");
		}
		else{
			header("location:buy_now.php?pid=$pid&msg=failed");
	
		}
	}
			
		

?>