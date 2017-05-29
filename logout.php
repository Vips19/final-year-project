<?php
	    mysql_connect("localhost","root","");
	mysql_select_db("watch_ecommerce");
	session_start();
	session_destroy();
	header("location:Admin_login.php?ch=logged out");
?>