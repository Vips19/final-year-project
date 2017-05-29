<?php
include("connection.php");
if(isset($_GET['pr1'])){
			 $pr1=$_GET['pr1'];
			 $qty1=$_GET['qty1'];
		}
		if(isset($_GET['pr2'])){
			$pr2=$_GET['pr2'];
			$qty2=$_GET['qty2'];
		}
		if(isset($_GET['pr3'])){
			$pr3=$_GET['pr3'];
			$qty3=$_GET['qty3'];
		}
		if(isset($_GET['pr4'])){
			$pr4=$_GET['pr4'];
			$qty4=$_GET['qty4'];
		}
		if(isset($_GET['pr5'])){
			$pr5=$_GET['pr5'];
			$qty5=$_GET['qty5'];
		}
	     $pay=$_GET['type_pay'];
		 $address=$_GET['addr_sel'];
		 $ct=$_GET['ct'];

 if(isset($_POST['conf_otp'])){
			// echo("insert into order_detail (Product1,Product2,Product3,Product4,Product5,address_no,Payment_mode,Status,Qty1,Qty2,Qty3,Qty4,Qty5,mobile) values('$pr1','$pr2','$pr3','$pr4','$pr5','$address','$pay','Processing','$qty1','$qty2','$qty3','$qty4','$qty5','{$_SESSION['user']['mobile']}')");
		  $query=mysql_query("insert into order_detail (Product1,Product2,Product3,Product4,Product5,address_no,Payment_mode,Status,Qty1,Qty2,Qty3,Qty4,Qty5,mobile) values('$pr1','$pr2','$pr3','$pr4','$pr5','$address','$pay','Processing','$qty1','$qty2','$qty3','$qty4','$qty5','{$_SESSION['user']['mobile']}')");
			if($query==1){
				if($ct=='y'){
					$query1=mysql_query("update cart_detail set Product_Id='0',Qty='1' where mobile='{$_SESSION['user']['mobile']}'");	
					if($query1==1){
						echo 'success';
					}
					
				}
				//header("location:order_back.php");
				
			}
		 }



?>