<style>
ul li{
	list-style-position:inside;
	list-style-type:none;
	border:1px solid black;
}
	ul li:hover{
		background-color:white;
	}
	
#brand-info-textarea::-webkit-scrollbar {
	visibility: hidden;
    width: 5px;
}
 
#brand-info-textarea::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
 
#brand-info-textarea::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
}

#brand-info-textarea{
	border: 2px solid #252839;
}

</style>
<table>
<tr>
          	<td style="vertical-align: top; text-align: left;">Product(s) Available</td>
            <td>
            <div>
            <table id="remove-brand-table">
<?php
	include("connection.php");
	$bn=$_GET['bn'];
	//$bn='Sonata';
	$sql="select Brand_Id,Brand_details from brand where Brand_Name='$bn'";
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)){
		$row=mysql_fetch_array($rs);
	}
	$sql1="select Product_Id,Product_Name from watch where Brand_Id='$row[0]' and Quantity>'0'";
    $rs1=mysql_query($sql1);
	if(mysql_num_rows($rs1)){
		while($row1=mysql_fetch_array($rs1)){
			?>
          
            <tr><td><?php echo "$row1[0]. $row1[1]"; ?></td></tr>
          
            <?php
		}
			$st='1';
	}
	else{
			$st='0';
		}
?>
			</table>
			</div>
            <input type="hidden" name="bid" value="<?php echo $row[0];?> "/>
		</td>
	</tr>
    <tr>
    	<td>Brand Details</td>
    	
		<td><textarea cols="50" rows="5" style="text-align:justify;" id="brand-info-textarea" disabled><?php echo $row[1] ?></textarea></td>
    </tr>
    <tr>
    <td>
    <?php
		if($st=='0' or $row1[0]==" "){
			
	?>
    <input type="submit" name="rm" value="Remove Brand"/>
    <?php
		}
	?>
    </td>
    </tr>
</table>