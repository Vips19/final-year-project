<?php
include("connection.php");
$pid=$_GET['pid'];
$f=0;
echo ("select * from cart_detail where mobile='{$_SESSION['user']['mobile']}'");
$sql=mysql_query("select * from cart_detail where mobile='{$_SESSION['user']['mobile']}'");
if(mysql_num_rows($sql)){
	while($row=mysql_fetch_array($sql)){
		
		if($row[2]==$pid){
			$f=1;
		}
	}
}
	$sql2=mysql_query("select Item_No from cart_detail where Product_Id='0' and mobile='{$_SESSION['user']['mobile']}'");
	$e=mysql_num_rows($sql2);
		 $row1=mysql_fetch_array($sql2);
			echo  $e;
	if($_SESSION['user']['mobile']!=NULL){
	if($e>0 && $f==0){
		$sql1=mysql_query("update cart_detail set Product_Id='$pid' where Item_No='$row1[0]' and mobile='{$_SESSION['user']['mobile']}'");
		if($sql1==1){
			header("location:cart.php?msg=");
			
		}
		else{
			header("location:product_info.php?Product_Id=".$pid."&cmsg=&msg=");
			
		}
	}
	if($f==1){
		
		header("location:product_info.php?cmsg=Product already exist&Product_Id=".$pid."&msg=");
	}
	if($e==0){
		
	header("location:product_info.php?cmsg=Cart Limit Reached&Product_Id=".$pid."&msg=");
	
	}
	}
	else{
		header("location:product_info.php?msg=Please Login to add item to cart&Product_Id=".$pid."&cmsg=");
	}

?>