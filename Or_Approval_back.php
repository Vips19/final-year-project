<?php
	include("connection.php");
	if($_POST['otype']=='delv'){

			if(!empty($_POST['d_chk'])) {
					
				foreach($_POST['d_chk'] as $a){
					//echo $a;
					$date=date("Y-m-d ");
					$query=mysql_query("update order_detail set Status='Delivered',Delivery_Date='$date' where Order_Id='$a'");
					if($query==1){
						header("location:Or_Approval.php?msg=Success");
					}
					else{
						header("location:Or_Approval.php?msg=Success");
					}
					
						
				}
			}
	}
	
	if($_POST['otype']=='can'){
		$str="";
		 $str=mt_rand(100000000,999999999);
		$str="Ref".$str;
		$query2=mysql_query("select Refund_Id from order_detail");
		if(mysql_num_rows($query2)){
			while($row=mysql_fetch_array($query2)){
				if($row[0]==$str){
					 $str=mt_rand(100000000,999999999);
					 $str="Ref".$str;
				}
			}
		}
					
			if(!empty($_POST['d_chk'])) {
					
				foreach($_POST['d_chk'] as $a){
					//echo $a;
					$query1=mysql_query("update order_detail set Refund_Id='$str', Statement='Refund Issued' where Order_Id='$a'");
					if($query==1){
						header("location:Or_Approval.php?msg=Success");
					}
					else{
						header("location:Or_Approval.php?msg=Success");
					}
				}
			}
	}
	if($_POST['otype']=='replace'){

			if(!empty($_POST['d_chk'])) {
					
				foreach($_POST['d_chk'] as $a){
					//echo $a;
					
					$query=mysql_query("update order_detail set Status='Processing',Statement='Replacement Request Accepted' where Order_Id='$a'");
					if($query==1){
						header("location:Or_Approval.php?msg=Success");
					}
					else{
						header("location:Or_Approval.php?msg=Success");
					}
					
						
				}
			}
	}
?>