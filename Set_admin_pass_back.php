
<?php
	include("admin_top.php");
	include("connection.php");
	
	 $un=$_POST['txt_un'];
     $epass=$_POST['txt_pas'];
	 $eid1=$_POST['txt_eid'];
	
			$a="";
			$otp="";
				$query=mysql_query("select Mob_No from admin where Emp_Id='$eid1'");
				if(mysql_num_rows($query)){
					$row=mysql_fetch_array($query);
					$a=$row[0];
				}
				 $m=substr($a,6,10);
			
			 $str=mt_rand(100000,999999);
			//$str=substr($str,0,6);
			
			$_SESSION['otp']=$str;
			$otp=$str;
			
			 $mob="91".$a;
		// Authorisation details.
			$username = "vibhashpratik19@gmail.com";
			$hash = "3391f9ae6f51d9d6cdc10f072242c56edb24c872c0dca866e9fb3970c7318e79";
		
			// Config variables. Consult http://api.textlocal.in/docs for more info.
			$test = "0";
		
			// Data for text message. This is the text message data.
			$sender = "TXTLCL"; // This is who the message appears to be from.
			$numbers = "$mob"; // A single number or a comma-seperated list of numbers
			$message = "Your One Time Password (OTP) is $otp";
			// 612 chars or less
			// A single number or a comma-seperated list of numbers
			$message = urlencode($message);
			$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
			$ch = curl_init('http://api.textlocal.in/send/?');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch); // This is the result from the API
			curl_close($ch);
			echo $result;
			//header("location:Set_admin_pass.php?flag=VERIFIED&otp=&eid=".$eid);
		
			
			
		/* echo $flag=$_POST['flag'];
		if($flag!='' && $flag!='EMPLOYEE DONOT EXISTS' && $flag!='PLEASE VERIFY USER')
		
		{
		
			$sql1="Update Admin set User_name='$un',Emp_pass='$epass' where Emp_Id='$eid1'";
			$rs1=mysql_query($sql1);
			if($rs1==1){
				
				header("location:Admin_login.php?flag=ADMIN DETAILS UPDATED&ch=");
			}
			else{
				header("location:Set_admin_pass.php?flag=NOT UPDATED&otp=&eid=");
				
			}
		}
		else{
			header("location:Set_admin_pass.php?flag=PLEASE VERIFY USER&otp=&eid=");
		}*/
	
	?>
		<div style="width:60%; margin-left:auto; margin-right:auto; height:400px; background-color:#FCFCFC; margin-bottom:10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.51); border-radius:5px;">
        	<p style="text-align:center; font-size:36px;">Enter Code</p>
            <p style="text-align:center;">For your security, we need to verify your identity. We've sent a code to the below mobile no . Please enter it below.</p>
           
            <p style="text-align:center; font-weight:bold;">******<?php echo $m; ?></p>
            <?php
				
				?>
            <form method="get" action="Verify_admin.php">
            <table>
            	<tr>
                    <td>
                        <input type="text" name="otp_no" placeholder="Code" id="otp_code" title="Code" style="text-align:center;" />
                        <input type="hidden" value="<?php echo $eid1;?>" name="eid" />
                        <input type="hidden" value="<?php echo $un;?>" name="un" />
                        <input type="hidden" value="<?php echo $epass;?>" name="epas" />
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit_otp" title="Verift Otp" onClick="return otpchk();" style="text-align:center;" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    
    
    </div>
	
</body>
</html>
<script>
			function otpchk(){
				var otp=document.getElementById("otp_code").value;
				var motp="<?php echo $_SESSION['otp']; ?>";
				
				if(otp == motp){
					return true;	
				}
				else{
					alert('Code is Incorrect');
					return false;
				}
			}
			
</script>