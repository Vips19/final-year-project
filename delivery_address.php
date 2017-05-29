<?php
	include("connection.php");
	$d=$_GET['d'];
	$row=array("");
	$query=mysql_query("select * from address where mobile='{$_SESSION['user']['mobile']}' and address_no='$d'");
	if(mysql_num_rows($query)){
		$row=mysql_fetch_array($query);
	}
?>
				<div class="bn-step-confirmed">
                	<p>&#x2714;</p>
                </div>
                
                <div class="bn-step-name">
                	<p>DELIVERY ADDRESS</p><br/>
                    <p style="color:#0099FF; font-size:12px;">Change Address</p>
                </div>
                
                <div class="bn-step-data">
                	<!--<p>Name</p><br/>-->
                	<p><?php echo $row[2]." ".$row[3]; ?></p><br/>
                    <p><?php  echo $row[4]." ",$row[5];?></p><br/>
                    <p>Pincode: <?php echo $row[6]; ?></p></br>
                    <p>Mobile: <?php echo $_SESSION['user']['mobile']; ?></p><br/>
       			</div>