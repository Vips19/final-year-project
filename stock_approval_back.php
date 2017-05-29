<?php
	include("connection.php");
	
	if(!empty($_GET['ps'])) {
			
		foreach($_GET['ps'] as $a){
			echo $v=$_GET['v'.$a];
			$sql=mysql_query("update newstock_transaction set  Product_approved='$v',Status='Approved' where Tid='$a'");
			if($sql==1){
				$sql2=mysql_query("select Quantity from watch where Product_Id=(select Product_Id from newstock_transaction where Tid='$a')");
				if(mysql_num_rows($sql2)){
					$row=mysql_fetch_array($sql2);
					$q=$row[0] + $v;
				$sql1=mysql_query("update watch set Quantity='$q' where Product_Id=(select Product_Id from newstock_transaction where Tid='$a')");
				if($sql1==1){
				header("location:stock_approval.php?msg=approved");
				}
				else{
					header("location:stock_approval.php?msg=wfailed");
				}
				}
			}
			else{
				header("location:stock_approval.php?msg=afailed");
			}
			
			
		}
	}

?>