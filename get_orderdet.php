<?php 
	include("connection.php");
	$type=$_GET['t'];
	?>
    <form method="post" action="Or_Approval_back.php" onSubmit="return vald();">
    <table class="order_request">
    	<tr>
        	<th>Order ID</th>
            <th>Order Date</th>
            <th>Payment Mode</th>
            <th>Current Status</th>
            <th></th>
            <th></th>
        
        </tr>
   
    <?php
	if($type=='delv'){
		$query=mysql_query("select * from order_detail where Status='Processing'");
		if(mysql_num_rows($query)){
			while($row=mysql_fetch_array($query)){
				?>
                <tr>
                	<td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[8]; ?></td>
                    <td><?php echo $row[9]; ?></td>
                    <td><input type="checkbox" name="d_chk[]" value="<?php echo $row[0]; ?>" /></td>
                </tr>
               
       
                <?php
			}
			?>
             <tr style="text-align:center;">
                    <td colspan="5">
                         <input type="hidden" name="otype" value="delv" />
                                <input type="Submit" name="Order_delivered" value="Order Delivered" /> 
                         
                    </td>
            	</tr>
            <?php
		}
		else{
			?>
            
			<tr style="text-align:center;">
            	<td colspan="5"><?php echo "No Result to display"; ?></td>
            </tr>
			<?php
        }
		?>
        
        	
        
        <?php
	}
	if($type=='can'){
		$query1=mysql_query("select * from order_detail where Status='Cancelled' and Payment_mode!='Cash On Delivery' and Refund_Id=' '");
		if(mysql_num_rows($query1)){
			while($row1=mysql_fetch_array($query1)){
				?>
                <tr>
                	<td><?php echo $row1[0]; ?></td>
                    <td><?php echo $row1[1]; ?></td>
                    <td><?php echo $row1[8]; ?></td>
                    <td><?php echo $row1[9]; ?></td>
                    <td><input type="checkbox" name="d_chk[]" value="<?php echo $row1[0]; ?>" /></td>
                </tr>
                
                <?php
			}
			?>
        	<tr style="text-align:center;">
            	<td colspan="5">
                    <input type="hidden" name="otype" value="can" />
                    <input type="Submit" name="Issue_refund" value="Issue Refund" />
                </td>
            </tr>
        
        <?php
		}
		else{
		?>
            
			<tr style="text-align:center;">
            	<td colspan="5"><?php echo "No Result to display"; ?></td>
            </tr>
			<?php
            }
	}
	if($type=='replace'){
		$query2=mysql_query("select * from order_detail where Status='Replacement_Requested'");
		if(mysql_num_rows($query2)){
			while($row2=mysql_fetch_array($query2)){
				?>
                <tr>
                	<td><?php echo $row2[0]; ?></td>
                    <td><?php echo $row2[1]; ?></td>
                    <td><?php echo $row2[8]; ?></td>
                    <td><?php echo $row2[9]; ?></td>
                    <td><input type="checkbox" name="d_chk[]" value="<?php echo $row2[0]; ?>" /></td>
                    <td colspan="2"><input type="button" onClick="window.location.href='reject_replce_req.php?id=<?php echo $row2[0]; ?>'" value="Reject Replacement Request" name="rej<?php echo $row2[0]; ?>" style="width:15em;" /></td>
                </tr>
                
                <?php
			}
			?>
        	<tr style="text-align:center;">
            	<td colspan="6">
                <input type="hidden" name="otype" value="replace" />
                <input type="submit" name="Rep_request_a" value="Accept Replacement Request" style="width:15em;" /></td>
               <!-- <td colspan="2"><input type="button" name="Rep_request_r" value="Reject Replacement Request" style="width:15em;" /></td>-->
            </tr>
        
        <?php
		}
		else{
			?>
            
			<tr style="text-align:center;">
            	<td colspan="5"><?php echo "No Result to display"; ?></td>
            </tr>
			<?php
		}
		
	}
	

?>
</table>
</form>
