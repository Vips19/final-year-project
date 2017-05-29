<?php
ob_start();
include("connection.php");
//session_start();
$mobile=$_SESSION['user']['mobile'];
 $m=substr($mobile,6,10);
			
			
			 

		$pr1="";
		$pr2="";
		$pr3="";
		$pr4="";
		$pr5="";
		$qty1="";
		$qty2="";
		$qty3="";
		$qty4="";
		$qty5="";
		/*if(isset($_GET['str'])){
			$str=$_GET['str'];
		}*/
		
		 //ob_end_clean();
		
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
		 $date=date("Y-m-d ");
		 if(isset($_GET['cowner'])){
			$name=$_GET['cowner'];
		}
		if(isset($_GET['downer'])){
			$name=$_GET['downer'];
		}
		 if(isset($_POST['conf_otp'])){
			 
			 if(isset($_GET['pr1'])){
	
			$query11=mysql_query("select Quantity from watch where Product_Id='$pr1'");
			if(mysql_num_rows($query11)){
				$row9=mysql_fetch_array($query11);
			    $q1=$row9[0]-$qty1;
				//echo "update watch set Quantity='$q1' where Product_Id='$pr1'";
				$query12=mysql_query("update watch set Quantity='$q1' where Product_Id='$pr1'");
				
				
			}
			
		}
		if(isset($_GET['pr2'])){
			
			$query13=mysql_query("select Quantity from watch where Product_Id='$pr2'");
			if(mysql_num_rows($query13)){
				$row10=mysql_fetch_array($query13);
				$q2=$row10[0]-$qty2;
				$query14=mysql_query("update watch set Quantity='$q2' where Product_Id='$pr2'");
				
			}
		}
		if(isset($_GET['pr3'])){
		
			$query15=mysql_query("select Quantity from watch where Product_Id='$pr3'");
			if(mysql_num_rows($query15)){
				$row11=mysql_fetch_array($query15);
				$q3=$row11[0]-$qty3;
				$query16=mysql_query("update watch set Quantity='$q3' where Product_Id='$pr3'");
				
			}
		}
		if(isset($_GET['pr4'])){
			
			$query17=mysql_query("select Quantity from watch where Product_Id='$pr4'");
			if(mysql_num_rows($query17)){
				$row12=mysql_fetch_array($query17);
				$q4=$row12[0]-$qty4;
				$query18=mysql_query("update watch set Quantity='$q4' where Product_Id='$pr4'");
				
			}
		}
		if(isset($_GET['pr5'])){
			
			$query19=mysql_query("select Quantity from watch where Product_Id='$pr5'");
			if(mysql_num_rows($query19)){
				$row13=mysql_fetch_array($query19);
				$q5=$row13[0]-$qty5;
				$query20=mysql_query("update watch set Quantity='$q5' where Product_Id='$pr5'");
				
			}
		}
			 
			 
			 
			 
			// echo("insert into order_detail (Product1,Product2,Product3,Product4,Product5,address_no,Payment_mode,Status,Qty1,Qty2,Qty3,Qty4,Qty5,mobile) values('$pr1','$pr2','$pr3','$pr4','$pr5','$address','$pay','Processing','$qty1','$qty2','$qty3','$qty4','$qty5','{$_SESSION['user']['mobile']}')");
		  $query=mysql_query("insert into order_detail (Date,Product1,Product2,Product3,Product4,Product5,address_no,Payment_mode,Status,Qty1,Qty2,Qty3,Qty4,Qty5,mobile) values('$date','$pr1','$pr2','$pr3','$pr4','$pr5','$address','$pay','Processing','$qty1','$qty2','$qty3','$qty4','$qty5','{$_SESSION['user']['mobile']}')");
			if($query==1){
				if($ct=='y'){
					$query1=mysql_query("update cart_detail set Product_Id='0',Qty='1' where mobile='{$_SESSION['user']['mobile']}'");	
					if($query1==1){
						echo 'success';
					}
					
				}
				header("location:order_back.php");
				
			}
		 }

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link href="otp_page.css" rel="stylesheet" />

<title>Confirm Payment</title>
<script>
			function otpchk(){
				
				var otp=document.getElementById("pay_otp_code").value;
				var motp="<?php echo $_SESSION['pay_otp']; ?>";
				//alert(<?php echo $_SESSION['pay_otp']; ?>);
				
				if(otp == motp){
					return true;	
				}
				else{
					alert('Code is Incorrect');
					return false;
				}
			}
			
</script>
</head>

<body class="body">

	<div class="payment-header">
    	<img src="Image/cc-avenue.jpg" />
    </div>

<div class="content">	

<div class="otp-info">
	<div>
    	<table>
        	<tr>
            	<td><p>Card Owner Name:</p></td>
                <td><p><?php echo $name; ?></p></td>
            </tr>
            
            <tr>
                <td colspan="2"><p><span style="">Total Amount:</span> <span>&#8377;<?php echo $_SESSION['total_price']; ?></span></p></td>
            </tr>
        </table>
    </div>
    <br/>
    <br/>
    <div>
    	<table>
        	<th><p>Confirm OTP</p></th>
            
            <tr>
            	<td><p>An OTP was sent to the Registered Mobile Number ******<?php echo $m; ?></p></td>
            </tr>
            <form onSubmit="return otpchk();" action="otp_page.php?type_pay=<?php echo $pay; ?>&pr1=<?php echo $pr1;?>&pr2=<?php echo $pr2; ?>&pr3=<?php echo $pr3; ?>&pr4=<?php echo $pr4; ?>&pr5=<?php echo $pr5; ?>&qty1=<?php echo $qty1; ?>&qty2=<?php echo $qty2; ?>&qty3=<?php echo $qty3; ?>&qty4=<?php echo $qty4; ?>&qty5=<?php echo $qty5; ?>&addr_sel=<?php echo $address; ?>&ct=<?php echo $ct; ?>" method="post">
            <tr>
            	<td><p><input type="text" name="otp_code" id="pay_otp_code" maxlength="6" pattern="[0-9]{6}" /></p></td>
            </tr>
            
            <tr>
            	<td><input type="submit"  value="Confirm OTP" name="conf_otp" class="submit-otp-button" style="border:none" /></td>
            </tr>
            </form>	
        </table>
    </div>
</div>


</div>    
</body>
</html>
<?php
	ob_end_flush();
?>