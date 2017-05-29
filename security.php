<?php
	
	if($_SESSION['admin']==NULL)
	{
		header("location:Admin_login.php?ch=Please LOGIN to continue");
	}
	
	
?>