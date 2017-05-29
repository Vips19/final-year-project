

<?php
	include("connection.php");
	
    echo $oid=$_GET['oid'];
	$query1=mysql_query("select Product1,Product2,Product3,Product4,Product5,Qty1,Qty2,Qty3,Qty4,Qty5 from order_detail where Order_Id='$oid'");
	if(mysql_num_rows($query1)){
		$row=mysql_fetch_array($query1);
		if($row[0]!=0){
			$query7=mysql_query("select Quantity from watch where Product_Id='$row[0]'");
			if(mysql_num_rows($query7)){
				$row1=mysql_fetch_array($query7);
				$q1=$row1[0]+$row[5];
			$query2=mysql_query("update watch set Quantity='$q1' where Product_Id='$row[0]'");
			}
		}
		if($row[1]!=0){
			$query8=mysql_query("select Quantity from watch where Product_Id='$row[1]'");
			if(mysql_num_rows($query8)){
				$row2=mysql_fetch_array($query8);
				$q2=$row2[0]+$row[6];
			$query3=mysql_query("update watch set Quantity='$q2' where Product_Id='$row[1]'");
			}
		}
		if($row[2]!=0){
			$query9=mysql_query("select Quantity from watch where Product_Id='$row[2]'");
			if(mysql_num_rows($query9)){
				$row3=mysql_fetch_array($query9);
				$q3=$row3[0]+$row[7];
			$query4=mysql_query("update watch set Quantity='$q3' where Product_Id='$row[2]'");
			}
		}
		if($row[3]!=0){
			$query10=mysql_query("select Quantity from watch where Product_Id='$row[3]'");
			if(mysql_num_rows($query10)){
				$row4=mysql_fetch_array($query10);
				$q4=$row4[0]+$row[8];
			$query5=mysql_query("update watch set Quantity='$q4' where Product_Id='$row[3]'");
			}
		}
		if($row[4]!=0){
			$query11=mysql_query("select Quantity from watch where Product_Id='$row[4]'");
			if(mysql_num_rows($query11)){
				$row5=mysql_fetch_array($query11);
				$q5=$row5[0]+$row[9];
			$query6=mysql_query("update watch set Quantity='$q5' where Product_Id='$row[4]'");
			}
		}
		
	}
	$statement="";
	$query12=mysql_query("select Payment_mode from order_detail where Order_Id='$oid'");
	if(mysql_num_rows($query12)){
		$row6=mysql_fetch_array($query12);
		if($row6[0]=='Cash On Delivery'){
			$statement='NO Refund';
		}
	}
	$query=mysql_query("update order_detail set Status='Cancelled',Statement='$statement' where mobile='{$_SESSION['user']['mobile']}' and Order_Id='$oid'");
	if($query==1){
		header("location:user_home.php?msg=sucess");
	}
	else{
		header("location:user_home.php?msg=failed");
	}
	
?>