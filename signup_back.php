<?php
	include("connection.php");
	$email=$_POST['em'];
	$mob_no=$_POST['mob'];
	$pass=$_POST['spwd'];
	$url=$_POST['uri'];
	$sql1=mysql_query("select * from user_info where mobile='$mob_no'");
	if(!(mysql_num_rows($sql1))){
		
		$sql="insert into user_info (email,pwd,mobile) values('$email','$pass','$mob_no')";
		$rs=mysql_query($sql);
		if($rs==1){
			$sql2=mysql_query("insert into address (address_no,mobile) values('1','$mob_no')");
			if($sql2==1){
				$_SESSION['user']['email']=$email;
				$_SESSION['user']['mobile']=$mob_no;
				$_SESSION['user']['pwd']=$pass;
				$sql3=mysql_query("insert into cart_detail (mobile,Item_No,Product_Id,Qty) values('$mob_no','1','0','1')");
				if($sql3==1){
					$sql4=mysql_query("insert into cart_detail (mobile,Item_No,Product_Id,Qty) values('$mob_no','2','0','1')");
					if($sql4==1){
						$sql5=mysql_query("insert into cart_detail (mobile,Item_No,Product_Id,Qty) values('$mob_no','3','0','1')");
					if($sql5==1){
						$sql6=mysql_query("insert into cart_detail (mobile,Item_No,Product_Id,Qty) values('$mob_no','4','0','1')");
						if($sql6==1){
							$sql7=mysql_query("insert into cart_detail (mobile,Item_No,Product_Id,Qty) values('$mob_no','5','0','1')");
							if($sql7==1){
					
							header("location:user_home.php?");
							}
							else
							echo ("error7");
						}
						else
							echo ("error6");
					}
					else
					echo ("error5");			
				}
				else
				echo ("error4");
							
				}
				else
				echo ("error3");
			}
		}
		else{
			header("location:$url?msg=error");
		}
	}
	else{
		header("location:$url?msg=User Alreday Exisit");	
	}

?>