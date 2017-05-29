<?php
	include("connection.php");
	echo $mob=$_POST['mn'];
	echo $pass=$_POST['lpwd'];
	echo $url=$_POST['uri'];
	
	$sql=mysql_query("select * from user_info where mobile='$mob'");
	if(mysql_num_rows($sql)){
		$row=mysql_fetch_array($sql);
			if($row[5]==$pass){
				$_SESSION['user']=$row;
				header("location:$url");
				
				
			}
			else{
				
				header("location:$url?msg=Incorrect Password");
			}
		
	}
	else{
		header("location:$url?msg=Account Not Found");	
	}
	


?>