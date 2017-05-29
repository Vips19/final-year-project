<?php
	include("admin_top.php");
	include("connection.php");
  
 $flag=$_GET['flag'];
 $otp=$_GET['otp'];
 $error="";
 $eid="";
 $eid=$_GET['eid'];
 
 if($flag!=''){
	 ?>
	 <script>alert(' <?php echo $flag;  ?>')</script>
     <?php
 }

	 if($otp=='')
	 {
	 }
	 else{
		 
	 	?>
        <script> alert('Your OTP(One Time Password)is: <?php echo $otp; ?>')</script>
        <?php
	 }
 
 ?>
 <script>
 /*	function otpcheck(str){
		<?php
		if(isset($_SESSION['otp'])){
			?>
		var otp = prompt("Please enter your OTP", "0");
		
		if (otp != 0) {
			if(otp == str){
				//document.getElementById("error").innerHTML = 'Your OTP is correct';
				return true;
			}
			else{
    			document.getElementById("error").innerHTML = 'Your OTP is Incorrect';
				return false;
			}
		}
		else{
			return false;
		}
		<?php
		}
		else
			{
		?>
		
		<?php
		
			}
			?>
	}
	/*function otpchk(){
		var f="<?php echo $flag; ?>";
		var str="<?php echo $_SESSION['otp']; ?>";	
		if(f=="VERIFIED"){
			var otp = prompt("Please enter your OTP", "0");
			
				if (otp != 0) {
					if(otp == str){
						document.getElementById("error").innerHTML = 'Your OTP is Correct';
						return true;
					}
					else{
						document.getElementById("error").innerHTML = 'Your OTP is Incorrect';
						return false;
					}
				}
				else{
					return false;
				}
			
		}
		
	}*/
		function chkEmpId()
		{
			var emp = document.getElementById("select_emp").value;
			
			if(emp == "--Select Employee ID--")
			{
				alert ('Select Employee ID');
				return false;
			}
			return true;
		}
	
 </script>
     
		
	<h1>ADD NEW ADMIN</h1>
	<p style="color:red; width:20%; height:20px; font-weight:bold;"><?php echo $flag; ?></p>
	<div id="outer">
		<h4>Please fill the below information carefully to sign-up..</h4>
		<form action="Set_admin_pass_back.php" method="post">
		<table id="tsap">
		<tr>
			<td>
            	<select name="txt_eid" id="select_emp" required>
                	<option disabled selected>--Select Employee ID--</option>
                    <?php
					$sql=mysql_query("select Emp_Id from admin where User_name=' ' and Emp_pass=' '"); 
					if(mysql_num_rows($sql)){
						while($row=mysql_fetch_array($sql)){
							?>
                    <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
                    <?php
						}
					}
					?>
                </select>
            </td>
			<!--<td><input type="text" name="txt_eid" placeholder="Employee ID" required autofocus /></td>-->
		</tr>
		<!--<tr>
		
			<td><input type="text" name="txt_mob" placeholder="Mobile Number" required /></td>
			<input type="hidden" name="flag" value="<?php echo $flag=$_GET['flag']; ?>"  >
		</tr>
		<tr>
			<td><input type="submit" value="VERIFY" name="btn_verify"  /></td>
		</tr>
		<p style="color:red;" id="error"></p>
		</table>
		</form>
	</div>
	<div id="outer">
		<form action="Set_admin_pass_back.php" method="POST" onSubmit="return otpcheck(<?php echo $_SESSION['otp']; ?>)" >
		<table id="tsap">
		<tr>
			
			<td><input type="text" name="txt_eid1" placeholder="Employee ID" disabled required value="<?php echo $eid; ?>" /></td>
		</tr>-->
		<tr>
			
			<td><input type="text" name="txt_un" placeholder="Username" required autofocus /></td>
		</tr>
		<tr>
		
			<td><input type="password" name="txt_pas" placeholder="Password" required /></td>
			<!--<input type="hidden" name="flag" value="<?php echo $flag=$_GET['flag']; ?>" >
            <input type="hidden" name="txt_eid2" value="<?php echo $eid; ?>" >-->
		</tr>
        <tr>
			
			<td><input type="password" name="txt_repas" placeholder="Re-Enter Password" required  /></td>
		</tr>
		<tr>
			<td><input type="submit" value="SUBMIT" onClick="return chkEmpId();" name="btn_add" /></td>
		</tr>
		<tr>
			
		</tr>
		</table>
		</form>
        <p name="err"></p>
	</div>
	
</body>
</html>
