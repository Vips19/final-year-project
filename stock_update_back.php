<?php
	include("connection.php");
	$dt=$_GET['date'];
         $i='C-';
    $cdate=$_GET['challan_date'];
	$cid=$i.$_GET['txt_challanid'];
	$bn=$_GET['bname'];
	$pn=$_GET['pname'];
	$pid=strtok($pn,".");
	$bprice=$_GET['txt_price'];
	$nop=$_GET['txt_nop'];
	
	$sql="select Brand_Id from watch where Product_Id='$pid'";
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)){
	$row=mysql_fetch_array($rs);
	}
	
	$status='Pending';
	 $eid=$_SESSION['admin']['Emp_Id'];
	echo $sql1="insert into newstock_transaction (Challan_Id,Challan_Date,Brand_Id,Product_Id,Buy_Price,Number_Of_Product,Date,Emp_Id,Status) Values('$cid','$cdate','$row[0]','$pid','$bprice','$nop','$dt','$eid','$status')";
	$rs1=mysql_query($sql1);
	if($rs1==1){
		header("location:stock_update.php?msg=Successful");
	}
	else
	{
		header("location:stock_update.php?msg=unsuccessful");
	}
?>