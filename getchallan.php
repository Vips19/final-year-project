<?php
	include("connection.php");
	
	$cid=$_GET['c'];
	
	$query=mysql_query("select distinct Challan_Date from newstock_transaction where Challan_Id='$cid'");
	if(mysql_num_rows($query)){
		$row=mysql_fetch_array($query);
	echo "<table border=\"2\" style=\"border-collapse:collapse; width:100%;\">";
	echo "<tr>";
		echo "<td>";
		echo "Challan Date";
		echo "</td>";
		echo "<td>";
	echo "<input value=\" $row[0]\" type=\"text\" disabled>";
	}
		echo "</td>";
	echo "</tr>";	
	echo "</table>";
	echo "<br/>";
	?>
	<form action="stock_approval_back.php" onSubmit="return vald();" method="get">
    <?php
	
	 echo "<table id=\"stock-approval-table\">";
	 
     
     
	  echo "<tr>";
	  			echo "<th></th>";	
            	echo "<th>";
				echo "Brand Name";
				echo "</th>";
				echo "<th>";
				echo "Product Image";
				echo "</th>";
				echo "<th>";
				echo "Buy Price";
				echo "</th>";
				echo "<th>";
				echo "Number Of Product";
				echo "</th>";
				echo "<th>";
				echo "Product Approved";
				echo "</th>";
				echo "<th></th>";
				//echo "<th></th>";
                
    echo "</tr>";
	$sql1=mysql_query("select * from newstock_transaction where Challan_id='$cid' and Status='Pending'");
	if(mysql_num_rows($sql1)){
		while($row1=mysql_fetch_array($sql1)){
		
		$sql2=mysql_query("select Brand_Name from brand where Brand_Id='$row1[3]'");
		if(mysql_num_rows($sql2)){
			$row2=mysql_fetch_array($sql2);
			$sql3=mysql_query("select Image1 from images where Product_Id='$row1[4]'");
				if(mysql_num_rows($sql3)){
				$row3=mysql_fetch_array($sql3);
			
   
   
    echo "<tr>";
				echo "<td><input  type=\"checkbox\" name=\"ps[]\" id=\"ps\" value=\"$row1[0]\" /></td>";
				echo "<td>$row2[0]</td>";
				echo "<td><img src=\"$row3[0]\" class=\"pimage\" style=\"width:60px; height:100px;\" alt=\"Images\"></td>";
				echo "<td>&#8377; $row1[5]</td>";
				echo "<td><input type=\"number\" value=\"$row1[6]\" disabled style=\"width:40px;\" /></td>";
				echo "<td><input type=\"number\" id=\"val$row1[0]\" name=\"v$row1[0]\"  style=\"width:50px;\" min=\"1\" max=\"$row1[6]\" value=\"$row1[6]\" onBlur=\"dis(this.id,this.value,$row1[6])\" /></td>";
				//echo "<td><input type=\"button\" id=\"edit$row1[0]\" value=\"Edit\" onClick=\"pe(this.id)\" /></td>";
	?>
    			<td><input type="button" id="r<?php echo $row1[0];  ?>" value="Reject" onClick="window.location.href='rejectchallan.php?id=<?php echo $row1[0]; ?>'" /></td>
                
    <?php
				//echo "<td><input type=\"button\" id=\"$row1[0]\" onClick=\"ca(this.id)\" value=\"Cancel\" /></td>";
            	
    echo "</tr>";
	
    		
    
    
   
				}
		}
		}
	}
	?>
	<tr>
            	<td colspan="7"><input type="submit"  value="Approve Stock" /></td>
            </tr>
            
            <?php
	
	 echo "</table>";
	
?>
</form>
