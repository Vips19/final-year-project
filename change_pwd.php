<?php
	mysql_connect("localhost","root","");
	mysql_select_db("watch_ecommerce");
	session_start();
	$pass=$_GET['s'];
	//echo ("select pwd from user_info where mobile='{$_SESSION['user']['mobile']}'");
	$sql=mysql_query("select pwd from user_info where mobile='{$_SESSION['user']['mobile']}'");
	if(mysql_num_rows($sql)){
		$row=mysql_fetch_array($sql);
		if($pass!=$row[0]){
			echo ("Incorrect password");
		}
		else{
			echo ("Correct Password");
		}
	}
	

?>