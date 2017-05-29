<?php 
include("admin_top.php");
include("connection.php");
include("security.php");
$sql="select Super_User from admin where Emp_Id='{$_SESSION['admin']['Emp_Id']}'";
			$rs=mysql_query($sql);
			if(mysql_num_rows($rs)){
				$row=mysql_fetch_array($rs);
include("admin_sidebar.php");
			}
?>

<script>
					
						function showProduct(str) {
  							var xhttp;
  							xhttp = new XMLHttpRequest();
 							 xhttp.onreadystatechange = function() {
   									 if (this.readyState == 4 && this.status == 200) {
     						 		document.getElementById("pn").innerHTML = this.responseText;
									
    								}
 							 };
 							 xhttp.open("GET", "getproduct.php?b="+str, true);
							 
  							 xhttp.send();
							 
							 
							 
							
						}
						function showImage(val) {
  							if(val=="")
								return;
							else 
							{
								if(window.XMLHttpRequest)
									xmlhttp=new XMLHttpRequest();
								else
									xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				
									xmlhttp.onreadystatechange = function() {
									if(this.readyState == 4 && this.status == 200)
										document.getElementById("img").innerHTML = this.responseText;
									};
 									 xmlhttp.open("GET", "getimage.php?pnam="+val, true);
  							 		 xmlhttp.send();
							}
						}
						
					</script>

<!--<h3 style="position:absolute;
			top:40px;
			left:800px;
            color:white;">Welcome:&nbsp;&nbsp;<?php //echo $_SESSION['admin']['Emp_name'] ?></h3>
 <a href="logout.php" style="position:absolute;
			top:20px;
            color:white;">Logout</a>-->

	<h2>Stock Update</h2>
     <a href="logout.php" style="position:absolute;
			top:80px;
            left:380px;
            color:white;">Logout</a>
	<div id="sudiv">
	<h3 id="suh3">New Stocks Arrivals</h3>
	<!--<table>
			<tr>
                <th><p>Product_Id</p></th>
                <th><p>Brand_Id</p></th>
                <th><p>Product_Name</p></th>  
				<th><p>Quantity</p></th>
                <th colspan="2"></th> 
                <th></th> 
                                
              </tr>  
	<?php
		/*	$sql="select Product_Id,Brand_Id,Product_Name,Quantity from watch";
			$rs=mysql_query($sql);
			if(mysql_num_rows($rs)){
					while($row=mysql_fetch_array($rs)){
	?>
				<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[2]; ?></td>
				
				<td><input type="text" name="value" id="<?php echo $row[0];?>" value="<?php echo $row[3];?>" disabled/></td>
                <td><input type="button" name="btn_edit" value="EDIT"  onClick="submit1(<?php echo $row[0];?>);"/></td>
         
                 <td><input type="submit" name="btn_up" value="UPDATE-<?php echo $row[0];?>"  /></td>
		
				</tr>
				<?php
					}
	 }*/
		?>
		</table>-->
        
        
        <p id="date"><?php echo "Date: ". date("Y-m-d ") ."<br>";
		
		 ?></p>
        
        <form action="stock_update_back.php" method="get">
        	<table id="tsu" style="width:100%;">
            <tr>
            	<td>Challan_Id:</td>
                <td>
                <input type="text" name="txt_c" value="C-" disabled="disabled" style="width:30px;border-right:0; text-align:center;"/>
                <input type="text" name="txt_challanid" autofocus required Style="border-left:0;" />
                </td>
                
                <td>Challan Date:</td>
                <td><input type="date" name="challan_date" /></td>
            </tr>
            <input type="hidden" name="date" value="<?php echo  date("Y-m-d "); ?>" />
            <tr>
            	<td>Brand Name:</td>
                <td>
                <select id="dd_bname" name="bname" required onchange="showProduct(this.value)">
                <option value="--Select--" selected="selected" disabled="disabled">--Select--</option>
               <?php $sql="select Brand_Name from brand";
					  $rs=mysql_query($sql);
					 if(mysql_num_rows($rs))
					 {
					  while($row=mysql_fetch_array($rs))
					  {
				  ?>
				 
				  <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
					<?php
					  
					  }
					 }
				?>          	
                </select>
                </td>
            </tr>
            <tr>
            	<td>Product Name:</td>
                <td>
                <select  name="pname" id="pn" required onchange="showImage(this.value)">
                	<option value="--Select--" selected="selected" disabled="disabled">--Select--</option> 
                                      				         
                </select>
                </td>
                <td colspan="2"><div id="img">
						<p>Product Image will be Displayed here</p>
					</div>
                 </td>
            	
            </tr>
            <tr>
            	<td>Buy Price</td>
                <td><input type="text" name="txt_price"  /></td>
            </tr>
            <tr>
            	<td>Number of Product</td>
                <td><input type="text" name="txt_nop" /></td>
            </tr>
            <tr>
            	<td><input type="submit" name="btn_sub" value="Submit" /></td>
            </tr>
            </table>
		</form>
	</div>
    
  </div>
</body>
</html>