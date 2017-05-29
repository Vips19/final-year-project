
<?php
	include("connection.php");
	$br=$_GET['b'];
	$q=$_GET['q'];
	$val='--Select--';
	if($q==1){
			$sql="select Product_Id,Product_Name from watch where Quantity='0' and Brand_id=(select Brand_id from Brand where Brand_Name='$br')";
	$rs=mysql_query($sql);
		
	}
	else{
		
	$sql="select Product_Id,Product_Name from watch where Brand_id=(select Brand_id from Brand where Brand_Name='$br')";
	$rs=mysql_query($sql);
	}
	
	echo "<select>";
	echo "<option value=".$val." selected disabled>--Select--</option>";
	if(mysql_num_rows($rs)){
		while($row=mysql_fetch_array($rs)){
		echo "<option value=\" $row[0].$row[1]\">$row[0].$row[1]</option>";
		}
	}else{
		
		echo "<option value=\"NO PRODUCT AVAILABLE TO REMOVE\" disabled=\"disabled\">NO PRODUCT AVAILABLE TO REMOVE</option>";
	}
	echo "</select>";
	


?>