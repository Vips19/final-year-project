<?php
	include("connection.php");
	
	
	if(isset($_GET['q1'])){
		echo $qt1=$_GET['q1'];
	}
	else{
		$qt1="";
	}
	if(isset($_GET['q2'])){
		echo $qt2=$_GET['q2'];
	}
	else{
		$qt2="";
	}
	if(isset($_GET['q3'])){
		echo $qt3=$_GET['q3'];
	}
	else{
		$qt3="";
	}
	if(isset($_GET['q4'])){
		echo $qt4=$_GET['q4'];
	}
	else{
		$qt4="";
	}
	if(isset($_GET['q5'])){
		echo $qt5=$_GET['q5'];
	}
	else{
		$qt5="";
	}
	
	if($qt1!=""){
		$query1=mysql_query("update cart_detail set Qty='$qt1' where mobile='{$_SESSION['user']['mobile']}' and Item_No='1'");
	}
	if($qt2!=""){
		$query2=mysql_query("update cart_detail set Qty='$qt2' where mobile='{$_SESSION['user']['mobile']}' and Item_No='2'");
	}
	if($qt3!=""){
		$query3=mysql_query("update cart_detail set Qty='$qt3' where mobile='{$_SESSION['user']['mobile']}' and Item_No='3'");
	}
	if($qt4!=""){
		$query4=mysql_query("update cart_detail set Qty='$qt4' where mobile='{$_SESSION['user']['mobile']}' and Item_No='4'");
	}
	if($qt5!=""){
		$query5=mysql_query("update cart_detail set Qty='$qt5' where mobile='{$_SESSION['user']['mobile']}' and Item_No='5'");
	}	
	
	if($query1==1 || $query2==1 || $query3==1 || $query4==1 || $query5==1){
		header("location:buy_now.php?");
	}
	else{
		header("location:buy_now.php?msg=failed");
	}
		
	
	
	

?>