<html>
<head>
</head>

<body>
<?php

	include("connection.php");
	
	$pnm=$_GET['pnam'];
	//$q=$_GET['q'];
	$pname=strtok("$pnm",".");
	
	$sql="select Image1,Image2 from images where Product_Id='$pname'";
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)){
		while($row=mysql_fetch_array($rs)){
			echo "<img src=\"$row[0]\" id=\"pimage\" width=\"200\" height=\"250\" style=\"border:1px solid black; padding:5px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.45), 0 6px 20px 0 rgba(0, 0, 0, 0.4);\"  />";
			
	/*<img src="<?php echo $row['0']; ?>" height="400px" width="600px" />-*/

        }
	}
	
	
	/*if($q==1){
		$query=mysql_query("select Quantity from watch where Product_Id='$pname'");
		if(mysql_num_rows($query)){
			$row=mysql_fetch_array($query);
		}
		echo "";
	}*/
?>	
</body>
</html>	
		 
	
